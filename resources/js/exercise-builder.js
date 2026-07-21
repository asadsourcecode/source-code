import { PageFlip } from 'page-flip';
import { pointToPagePercent, pagePercentToScreenPoint, pageSideInSpread, getPageDimensions, updateBackdrop } from './page-overlay.js';
import { createPageWindow } from './page-window-loader.js';

document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('book-flip');
    const wrapper = document.getElementById('book-flip-wrapper');
    const backdrop = document.getElementById('book-flip-backdrop');
    const overlayLayer = document.getElementById('pin-layer');
    if (!el || !wrapper) return;

    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';

    const images = window.__bookPages || [];
    if (images.length === 0) return;

    let fields = window.__exerciseFields || [];
    const routes = window.__exerciseFieldRoutes;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // Fill the entire panel, full width and height — the page image stretches
    // to match rather than preserving its true aspect ratio (explicit choice:
    // filling the space entirely was prioritized over keeping pages undistorted).
    // page-flip's width/height options size a SINGLE page — it doubles that for
    // the two-page landscape spread — so we pass half the container's width,
    // not the whole thing (else it never fits two pages side by side).
    const bookWidth = wrapper.clientWidth / 2;
    const bookHeight = wrapper.clientHeight;

    const pageFlip = new PageFlip(el, {
        width: Math.round(bookWidth),
        height: Math.round(bookHeight),
        size: 'fixed',
        maxShadowOpacity: 0.5,
        showCover: false,
        mobileScrollSupport: true,
        // Placing/moving a field is done by clicking the page — page-flip's own
        // click-to-turn-page behavior would otherwise fire on the same click.
        disableFlipByClick: true,
    });

    const indicator = document.getElementById('book-page-indicator');
    const prevBtn = document.getElementById('book-prev');
    const nextBtn = document.getElementById('book-next');

    let leftPageNumber = 1;

    function visiblePageNumbers() {
        const orientation = pageFlip.getOrientation();
        const nums = [leftPageNumber];
        if (orientation === 'landscape' && leftPageNumber + 1 <= images.length) {
            nums.push(leftPageNumber + 1);
        }
        return nums;
    }

    function esc(str) {
        return (str || '').replace(/"/g, '&quot;').replace(/</g, '&lt;');
    }

    function fontStyle(field) {
        const size = field.font_size || 14;
        const family = field.font_family || 'Work Sans, sans-serif';
        const weight = field.font_weight || 'normal';
        return `font-family: ${family}; font-size: ${size}px; font-weight: ${weight};`;
    }

    // Fields sit directly on the page like real HTML: fully transparent, no
    // borders — just the control itself with the page image showing through.
    // These are clickable/typeable so the teacher can see exactly how it will
    // feel to a student, but nothing here is ever saved as an "answer" — the
    // builder only stores the field's definition (label/options/position/size),
    // not a response. Real answers are only collected on a student's assignment.
    function buildPreviewControl(field) {
        const style = fontStyle(field);

        if (field.type === 'text') {
            return `<input type="text" placeholder="${esc(field.label)}" style="${style}"
                class="w-full h-full px-2 py-1.5 box-border bg-transparent border-0 focus:outline-none placeholder:text-[#1B1C1C]/50">`;
        }
        if (field.type === 'textarea') {
            return `<textarea placeholder="${esc(field.label)}" style="${style}"
                class="w-full h-full px-2 py-1.5 box-border bg-transparent border-0 resize-none focus:outline-none placeholder:text-[#1B1C1C]/50"></textarea>`;
        }
        if (field.type === 'radio' || field.type === 'checkbox') {
            const inputType = field.type === 'radio' ? 'radio' : 'checkbox';
            const name = field.type === 'radio' ? `preview_${field.id}` : undefined;
            return `
                <div class="w-full h-full box-border overflow-auto flex flex-col gap-1 px-2 py-1.5 bg-transparent" style="${style}">
                    <p class="leading-tight drop-shadow-[0_1px_2px_rgba(255,255,255,0.9)]">${esc(field.label)}</p>
                    ${(field.options || []).map((opt) => `
                        <label class="flex items-center gap-1.5 text-[#1B1C1C] drop-shadow-[0_1px_2px_rgba(255,255,255,0.9)]">
                            <input type="${inputType}" ${name ? `name="${name}"` : ''}> ${esc(opt)}
                        </label>
                    `).join('')}
                </div>
            `;
        }
        return '';
    }

    function renderFieldOverlays() {
        overlayLayer.innerHTML = '';
        const { pageWidth, pageHeight } = getPageDimensions(pageFlip, el);

        fields.forEach((field, idx) => {
            const side = pageSideInSpread(pageFlip.getOrientation(), leftPageNumber, images.length, field.page_number);
            if (!side) return;

            const point = pagePercentToScreenPoint(pageFlip, el, side, field.position_x, field.position_y);
            const widthPx = (field.width / 100) * pageWidth;
            const heightPx = (field.height / 100) * pageHeight;

            const box = document.createElement('div');
            box.className = 'group';
            Object.assign(box.style, {
                position: 'fixed',
                left: point.left + 'px',
                top: point.top + 'px',
                width: widthPx + 'px',
                height: heightPx + 'px',
                pointerEvents: 'auto',
                zIndex: '25',
            });

            // Note: these controls are always visible (not hover-revealed) — Tailwind's
            // group-hover compiles to `@media (hover: hover)`, which many Windows
            // touchscreen/hybrid-input laptops report as false, permanently hiding
            // hover-only UI with no way to discover or trigger it.
            box.innerHTML = `
                <div class="relative w-full h-full">
                    <div data-drag-handle="${field.id}" class="absolute -top-5 left-0 flex items-center gap-2 bg-[#216C22] rounded px-1.5 py-0.5 whitespace-nowrap cursor-move shadow-sm">
                        <span class="text-[9px] font-bold text-white">#${idx + 1}</span>
                        <button type="button" data-font="${field.id}" class="text-[9px] font-semibold text-white hover:underline">Aa</button>
                        <button type="button" data-delete="${field.id}" class="text-[9px] font-semibold text-[#FFD5D5] hover:underline">Delete</button>
                    </div>
                    <div class="w-full h-full">${buildPreviewControl(field)}</div>
                    <div data-resize="${field.id}"
                        class="absolute -bottom-1.5 -right-1.5 w-3.5 h-3.5 bg-[#216C22] border border-white rounded-sm cursor-nwse-resize"></div>
                </div>
            `;

            overlayLayer.appendChild(box);
        });

        overlayLayer.querySelectorAll('[data-delete]').forEach((btn) => {
            btn.addEventListener('click', () => deleteField(parseInt(btn.dataset.delete, 10)));
        });
        overlayLayer.querySelectorAll('[data-resize]').forEach((handle) => {
            handle.addEventListener('mousedown', (e) => startResize(e, parseInt(handle.dataset.resize, 10)));
        });
        overlayLayer.querySelectorAll('[data-font]').forEach((btn) => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                openFontEditor(parseInt(btn.dataset.font, 10), btn);
            });
        });
        overlayLayer.querySelectorAll('[data-drag-handle]').forEach((handle) => {
            handle.addEventListener('mousedown', (e) => {
                // Let the Aa/Delete buttons inside the handle bar work normally.
                if (e.target.closest('button')) return;
                startDrag(e, parseInt(handle.dataset.dragHandle, 10));
            });
        });
    }

    // --- Font editor popover ---

    const fontFamilies = window.__fontFamilies || ['Work Sans, sans-serif'];
    let fontEditorEl = null;

    function closeFontEditor() {
        if (fontEditorEl) {
            fontEditorEl.remove();
            fontEditorEl = null;
        }
    }

    function openFontEditor(fieldId, anchorBtn) {
        closeFontEditor();

        const field = fields.find((f) => f.id === fieldId);
        if (!field) return;

        const anchorRect = anchorBtn.getBoundingClientRect();

        const popover = document.createElement('div');
        popover.className = 'flex flex-col gap-1.5 bg-white border border-[#C0C9B9] rounded-[6px] shadow-lg p-2';
        Object.assign(popover.style, {
            position: 'fixed',
            left: anchorRect.left + 'px',
            top: (anchorRect.bottom + 4) + 'px',
            zIndex: '30',
            width: '190px',
        });

        popover.innerHTML = `
            <select data-editor-family class="border border-[#C0C9B9] rounded-[4px] text-[11px] font-['Work_Sans',sans-serif] py-1 px-1.5">
                ${fontFamilies.map((fam) => `<option value="${esc(fam)}" ${fam === field.font_family ? 'selected' : ''}>${esc(fam.split(',')[0])}</option>`).join('')}
            </select>
            <div class="flex gap-1.5">
                <select data-editor-weight class="flex-1 border border-[#C0C9B9] rounded-[4px] text-[11px] font-['Work_Sans',sans-serif] py-1 px-1.5">
                    <option value="normal" ${field.font_weight === 'normal' ? 'selected' : ''}>Normal</option>
                    <option value="bold" ${field.font_weight === 'bold' ? 'selected' : ''}>Bold</option>
                </select>
                <input data-editor-size type="number" min="8" max="48" value="${field.font_size || 14}"
                    class="w-14 border border-[#C0C9B9] rounded-[4px] text-[11px] font-['Work_Sans',sans-serif] py-1 px-1.5">
            </div>
        `;

        document.body.appendChild(popover);
        fontEditorEl = popover;

        function applyChange() {
            const family = popover.querySelector('[data-editor-family]').value;
            const weight = popover.querySelector('[data-editor-weight]').value;
            const size = parseInt(popover.querySelector('[data-editor-size]').value, 10) || 14;

            fetch(`${routes.update}/${fieldId}`, {
                method: 'PATCH',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ font_family: family, font_weight: weight, font_size: size }),
            })
                .then((r) => r.json())
                .then((updated) => {
                    const idx = fields.findIndex((f) => f.id === updated.id);
                    if (idx !== -1) fields[idx] = updated;
                    renderFieldOverlays();
                })
                .catch(() => alert('Could not update the font. Please try again.'));
        }

        popover.querySelectorAll('select, input').forEach((el) => {
            el.addEventListener('change', applyChange);
        });
        popover.addEventListener('click', (e) => e.stopPropagation());
    }

    document.addEventListener('click', closeFontEditor);

    // --- Resize flow ---

    let resizing = null;

    function startResize(e, fieldId) {
        e.preventDefault();
        e.stopPropagation();

        const field = fields.find((f) => f.id === fieldId);
        if (!field) return;

        const { pageWidth, pageHeight } = getPageDimensions(pageFlip, el);
        const boxEl = e.target.closest('.group');

        resizing = {
            fieldId,
            startClientX: e.clientX,
            startClientY: e.clientY,
            startWidthPx: (field.width / 100) * pageWidth,
            startHeightPx: (field.height / 100) * pageHeight,
            pageWidth,
            pageHeight,
            boxEl,
            currentWidthPx: null,
            currentHeightPx: null,
        };

        document.addEventListener('mousemove', onResizeMove);
        document.addEventListener('mouseup', onResizeEnd);
    }

    function onResizeMove(e) {
        if (!resizing) return;

        const deltaX = e.clientX - resizing.startClientX;
        const deltaY = e.clientY - resizing.startClientY;
        const newWidthPx = Math.max(24, resizing.startWidthPx + deltaX);
        const newHeightPx = Math.max(18, resizing.startHeightPx + deltaY);

        resizing.boxEl.style.width = newWidthPx + 'px';
        resizing.boxEl.style.height = newHeightPx + 'px';
        resizing.currentWidthPx = newWidthPx;
        resizing.currentHeightPx = newHeightPx;
    }

    function onResizeEnd() {
        if (!resizing) return;
        document.removeEventListener('mousemove', onResizeMove);
        document.removeEventListener('mouseup', onResizeEnd);

        const { fieldId, pageWidth, pageHeight, currentWidthPx, currentHeightPx, startWidthPx, startHeightPx } = resizing;
        resizing = null;

        const widthPx = currentWidthPx ?? startWidthPx;
        const heightPx = currentHeightPx ?? startHeightPx;
        const width = Math.max(3, Math.min(100, (widthPx / pageWidth) * 100));
        const height = Math.max(2, Math.min(100, (heightPx / pageHeight) * 100));

        fetch(`${routes.update}/${fieldId}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ width, height }),
        })
            .then((r) => r.json())
            .then((updated) => {
                const idx = fields.findIndex((f) => f.id === updated.id);
                if (idx !== -1) fields[idx] = updated;
                renderFieldOverlays();
            })
            .catch(() => alert('Could not resize the field. Please try again.'));
    }

    // --- Drag-to-move flow ---

    let dragging = null;

    function startDrag(e, fieldId) {
        e.preventDefault();
        e.stopPropagation();

        const field = fields.find((f) => f.id === fieldId);
        if (!field) return;

        const { pageWidth, pageHeight } = getPageDimensions(pageFlip, el);
        const boxEl = e.target.closest('.group');

        dragging = {
            fieldId,
            startClientX: e.clientX,
            startClientY: e.clientY,
            startLeft: parseFloat(boxEl.style.left),
            startTop: parseFloat(boxEl.style.top),
            startPositionX: field.position_x,
            startPositionY: field.position_y,
            pageWidth,
            pageHeight,
            boxEl,
            currentPositionX: null,
            currentPositionY: null,
        };

        document.addEventListener('mousemove', onDragMove);
        document.addEventListener('mouseup', onDragEnd);
    }

    function onDragMove(e) {
        if (!dragging) return;

        const deltaX = e.clientX - dragging.startClientX;
        const deltaY = e.clientY - dragging.startClientY;

        dragging.boxEl.style.left = (dragging.startLeft + deltaX) + 'px';
        dragging.boxEl.style.top = (dragging.startTop + deltaY) + 'px';

        const deltaXPercent = (deltaX / dragging.pageWidth) * 100;
        const deltaYPercent = (deltaY / dragging.pageHeight) * 100;

        dragging.currentPositionX = Math.max(0, Math.min(100, dragging.startPositionX + deltaXPercent));
        dragging.currentPositionY = Math.max(0, Math.min(100, dragging.startPositionY + deltaYPercent));
    }

    function onDragEnd() {
        if (!dragging) return;
        document.removeEventListener('mousemove', onDragMove);
        document.removeEventListener('mouseup', onDragEnd);

        const { fieldId, currentPositionX, currentPositionY, startPositionX, startPositionY } = dragging;
        dragging = null;

        const position_x = currentPositionX ?? startPositionX;
        const position_y = currentPositionY ?? startPositionY;

        fetch(`${routes.update}/${fieldId}`, {
            method: 'PATCH',
            headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
            body: JSON.stringify({ position_x, position_y }),
        })
            .then((r) => r.json())
            .then((updated) => {
                const idx = fields.findIndex((f) => f.id === updated.id);
                if (idx !== -1) fields[idx] = updated;
                renderFieldOverlays();
            })
            .catch(() => alert('Could not move the field. Please try again.'));
    }

    const updateIndicator = () => {
        const nums = visiblePageNumbers();
        indicator.textContent = nums.join('-') + ' / ' + images.length;
        prevBtn.disabled = leftPageNumber <= 1;
        nextBtn.disabled = leftPageNumber + (nums.length - 1) >= images.length;
    };

    pageFlip.on('init', () => {
        leftPageNumber = 1;
        updateIndicator();
        renderFieldOverlays();
        updateBackdrop(backdrop, images, leftPageNumber);
    });

    const pageWindow = createPageWindow(pageFlip, images, 1);

    pageFlip.on('flip', (e) => {
        leftPageNumber = e.data + 1;
        updateIndicator();
        renderFieldOverlays();
        updateBackdrop(backdrop, images, leftPageNumber);
        pageWindow.maybeExtend(e.data);
    });

    pageFlip.loadFromImages(pageWindow.initialImages);

    prevBtn.addEventListener('click', () => pageFlip.flipPrev());
    nextBtn.addEventListener('click', () => pageFlip.flipNext());

    window.addEventListener('resize', () => renderFieldOverlays());

    // --- Add / move field flow ---

    const typeSelect = document.getElementById('new-field-type');
    const labelInput = document.getElementById('new-field-label');
    const optionsTextarea = document.getElementById('new-field-options');
    const fontFamilySelect = document.getElementById('new-field-font-family');
    const fontWeightSelect = document.getElementById('new-field-font-weight');
    const fontSizeInput = document.getElementById('new-field-font-size');
    const placeBtn = document.getElementById('place-field-btn');
    const placementHint = document.getElementById('placement-hint');

    typeSelect.addEventListener('change', () => {
        const needsOptions = typeSelect.value === 'radio' || typeSelect.value === 'checkbox';
        optionsTextarea.classList.toggle('hidden', !needsOptions);
    });

    let placement = null; // { mode: 'create' } — moving an existing field is now done by dragging it directly

    function armPlacement(p) {
        placement = p;
        placementHint.classList.remove('hidden');
        el.style.cursor = 'crosshair';

        // Let clicks pass straight through to the book underneath while placing —
        // otherwise clicking a destination that happens to overlap an existing
        // field's box would silently hit that box instead of registering the
        // new position. Restored automatically next time renderFieldOverlays()
        // rebuilds the boxes (after the placement completes).
        Array.from(overlayLayer.children).forEach((child) => {
            child.style.pointerEvents = 'none';
        });
    }

    function disarmPlacement() {
        placement = null;
        placementHint.classList.add('hidden');
        el.style.cursor = '';
    }

    placeBtn.addEventListener('click', () => {
        if (!labelInput.value.trim()) {
            alert('Enter the question text first.');
            return;
        }
        armPlacement({ mode: 'create' });
    });

    el.addEventListener('click', (e) => {
        if (!placement) return;

        const point = pointToPagePercent(pageFlip, el, e.clientX, e.clientY);
        if (!point) return;

        const pageNumber = point.side === 'right' ? leftPageNumber + 1 : leftPageNumber;

        if (placement.mode === 'create') {
            const type = typeSelect.value;
            const needsOptions = type === 'radio' || type === 'checkbox';
            const options = needsOptions
                ? optionsTextarea.value.split('\n').map((s) => s.trim()).filter(Boolean)
                : null;

            fetch(routes.store, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({
                    page_number: pageNumber,
                    type,
                    label: labelInput.value.trim(),
                    options,
                    position_x: point.xPercent,
                    position_y: point.yPercent,
                    font_family: fontFamilySelect.value,
                    font_weight: fontWeightSelect.value,
                    font_size: parseInt(fontSizeInput.value, 10) || 14,
                }),
            })
                .then((r) => r.json())
                .then((field) => {
                    fields.push(field);
                    labelInput.value = '';
                    optionsTextarea.value = '';
                    disarmPlacement();
                    renderFieldOverlays();
                })
                .catch(() => alert('Could not save the field. Please try again.'));
        }
    });

    function deleteField(fieldId) {
        if (!confirm('Delete this field?')) return;

        fetch(`${routes.destroy}/${fieldId}`, {
            method: 'DELETE',
            headers: { Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
        })
            .then(() => {
                fields = fields.filter((f) => f.id !== fieldId);
                renderFieldOverlays();
            })
            .catch(() => alert('Could not delete the field. Please try again.'));
    }
});
