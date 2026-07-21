import { PageFlip } from 'page-flip';
import { pagePercentToScreenPoint, pageSideInSpread, getPageDimensions, updateBackdrop } from './page-overlay.js';
import { createPageWindow } from './page-window-loader.js';

document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('book-flip');
    const wrapper = document.getElementById('book-flip-wrapper');
    const backdrop = document.getElementById('book-flip-backdrop');
    const overlayLayer = document.getElementById('pin-layer');
    const submitBtn = document.getElementById('submit-assignment-btn');
    const submitStatusEl = document.getElementById('submit-status');
    if (!el || !wrapper) return;

    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';

    const images = window.__bookPages || [];
    if (images.length === 0) return;

    const fields = window.__exerciseFields || [];
    const existingAnswers = window.__existingAnswers || {};
    const routes = window.__assignmentRoutes;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let submitted = window.__assignmentStatus === 'submitted';

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
        // Answer controls float on the page — a click-to-flip-page gesture would
        // interfere with clicking radios/checkboxes/text boxes placed there.
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

    let saveTimers = {};
    function saveAnswer(fieldId, value) {
        clearTimeout(saveTimers[fieldId]);
        saveTimers[fieldId] = setTimeout(() => {
            fetch(routes.saveAnswer, {
                method: 'PATCH',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
                body: JSON.stringify({ exercise_field_id: fieldId, value }),
            }).catch(() => {});
        }, 400);
    }

    function fontStyle(field) {
        const size = field.font_size || 14;
        const family = field.font_family || 'Work Sans, sans-serif';
        const weight = field.font_weight || 'normal';
        return `font-family: ${family}; font-size: ${size}px; font-weight: ${weight};`;
    }

    // Controls sit directly on the page like real HTML: fully transparent, no
    // borders, sized/styled to match whatever the teacher set.
    function buildControl(field) {
        const disabledAttr = submitted ? 'disabled' : '';
        const style = fontStyle(field);

        if (field.type === 'text') {
            const val = existingAnswers[field.id] || '';
            return `<input type="text" data-field="${field.id}" value="${esc(val)}" placeholder="${esc(field.label)}" ${disabledAttr} style="${style}"
                class="w-full h-full px-2 py-1.5 box-border bg-transparent border-0 focus:outline-none placeholder:text-[#1B1C1C]/50">`;
        }
        if (field.type === 'textarea') {
            const val = existingAnswers[field.id] || '';
            return `<textarea data-field="${field.id}" placeholder="${esc(field.label)}" ${disabledAttr} style="${style}"
                class="w-full h-full px-2 py-1.5 box-border bg-transparent border-0 resize-none focus:outline-none placeholder:text-[#1B1C1C]/50">${esc(val)}</textarea>`;
        }
        if (field.type === 'radio') {
            const val = existingAnswers[field.id] || '';
            return `
                <div class="w-full h-full box-border overflow-auto flex flex-col gap-1 px-2 py-1.5 bg-transparent" style="${style}">
                    <p class="leading-tight drop-shadow-[0_1px_2px_rgba(255,255,255,0.9)]">${esc(field.label)}</p>
                    ${(field.options || []).map((opt) => `
                        <label class="flex items-center gap-1.5 text-[#1B1C1C] drop-shadow-[0_1px_2px_rgba(255,255,255,0.9)]">
                            <input type="radio" name="field_${field.id}" value="${esc(opt)}" data-field="${field.id}"
                                ${val === opt ? 'checked' : ''} ${disabledAttr}> ${esc(opt)}
                        </label>
                    `).join('')}
                </div>
            `;
        }
        if (field.type === 'checkbox') {
            let selected = [];
            try { selected = JSON.parse(existingAnswers[field.id] || '[]'); } catch (e) { selected = []; }
            return `
                <div class="w-full h-full box-border overflow-auto flex flex-col gap-1 px-2 py-1.5 bg-transparent" style="${style}">
                    <p class="leading-tight drop-shadow-[0_1px_2px_rgba(255,255,255,0.9)]">${esc(field.label)}</p>
                    ${(field.options || []).map((opt) => `
                        <label class="flex items-center gap-1.5 text-[#1B1C1C] drop-shadow-[0_1px_2px_rgba(255,255,255,0.9)]">
                            <input type="checkbox" value="${esc(opt)}" data-field="${field.id}"
                                ${selected.includes(opt) ? 'checked' : ''} ${disabledAttr}> ${esc(opt)}
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

        fields.forEach((field) => {
            const side = pageSideInSpread(pageFlip.getOrientation(), leftPageNumber, images.length, field.page_number);
            if (!side) return;

            const point = pagePercentToScreenPoint(pageFlip, el, side, field.position_x, field.position_y);
            const widthPx = (field.width / 100) * pageWidth;
            const heightPx = (field.height / 100) * pageHeight;

            const box = document.createElement('div');
            Object.assign(box.style, {
                position: 'fixed',
                left: point.left + 'px',
                top: point.top + 'px',
                width: widthPx + 'px',
                height: heightPx + 'px',
                pointerEvents: 'auto',
                zIndex: '25',
            });

            box.innerHTML = buildControl(field);

            overlayLayer.appendChild(box);
        });

        if (submitted) return;

        overlayLayer.querySelectorAll('input[type="text"][data-field], textarea[data-field]').forEach((elm) => {
            elm.addEventListener('input', () => saveAnswer(parseInt(elm.dataset.field, 10), elm.value));
        });

        overlayLayer.querySelectorAll('input[type="radio"][data-field]').forEach((elm) => {
            elm.addEventListener('change', () => saveAnswer(parseInt(elm.dataset.field, 10), elm.value));
        });

        fields.filter((f) => f.type === 'checkbox').forEach((field) => {
            const boxes = overlayLayer.querySelectorAll(`input[type="checkbox"][data-field="${field.id}"]`);
            boxes.forEach((box) => {
                box.addEventListener('change', () => {
                    const checked = Array.from(boxes).filter((b) => b.checked).map((b) => b.value);
                    saveAnswer(field.id, checked);
                });
            });
        });
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

    function showSubmittedBadge() {
        submitStatusEl.innerHTML = `<span class="inline-block bg-[#DFF5E1] text-[#216C22] font-['Work_Sans',sans-serif] font-semibold text-[12px] px-3 py-1 rounded-full">Submitted</span>`;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitted';
    }

    if (submitted) {
        showSubmittedBadge();
    } else {
        submitBtn.addEventListener('click', () => {
            if (!confirm('Submit this assignment? You will not be able to change your answers afterwards.')) return;

            fetch(routes.submit, {
                method: 'POST',
                headers: { Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken },
            })
                .then((r) => r.json())
                .then(() => {
                    submitted = true;
                    showSubmittedBadge();
                    renderFieldOverlays();
                })
                .catch(() => alert('Could not submit. Please try again.'));
        });
    }
});
