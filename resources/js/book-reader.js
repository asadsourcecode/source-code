import { PageFlip } from 'page-flip';
import { createPageWindow } from './page-window-loader.js';
import { updateBackdrop } from './page-overlay.js';

document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('book-flip');
    const wrapper = document.getElementById('book-flip-wrapper');
    const backdrop = document.getElementById('book-flip-backdrop');
    if (!el || !wrapper) return;

    // This is a fixed, single-view reader by design — never let it scroll,
    // regardless of minor sub-pixel sizing differences across browsers.
    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';

    const images = window.__bookPages || [];
    if (images.length === 0) return;

    const initialPage = Math.min(Math.max(window.__bookInitialPage || 1, 1), images.length);
    const progressUrl = window.__bookProgressUrl;

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
        // 'fixed' (not 'stretch') — renders at exactly the box we computed above.
        // 'stretch' mode expanded past our height constraints on books whose real
        // page aspect ratio didn't match what we'd assumed, overflowing into the
        // Prev/Next buttons below.
        size: 'fixed',
        maxShadowOpacity: 0.5,
        showCover: false,
        mobileScrollSupport: true,
    });

    const indicator = document.getElementById('book-page-indicator');
    const prevBtn = document.getElementById('book-prev');
    const nextBtn = document.getElementById('book-next');
    const progressBar = document.getElementById('book-progress-bar');
    const progressPercent = document.getElementById('book-progress-percent');

    const updateUI = (pageIndex) => {
        const pageNumber = pageIndex + 1;
        indicator.textContent = pageNumber + ' / ' + images.length;
        prevBtn.disabled = pageIndex === 0;
        nextBtn.disabled = pageIndex === images.length - 1;

        const percent = Math.round((pageNumber / images.length) * 100);
        progressBar.style.width = percent + '%';
        progressPercent.textContent = percent + '%';
    };

    let saveTimeout = null;
    const saveProgress = (pageNumber) => {
        if (!progressUrl) return;
        clearTimeout(saveTimeout);
        saveTimeout = setTimeout(() => {
            fetch(progressUrl, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ page: pageNumber }),
            }).catch(() => {});
        }, 400);
    };

    const pageWindow = createPageWindow(pageFlip, images, initialPage);

    // Must register 'init' before calling loadFromImages so the resume-page jump applies.
    pageFlip.on('init', () => {
        pageFlip.turnToPage(initialPage - 1);
        updateUI(initialPage - 1);
        updateBackdrop(backdrop, images, initialPage);
    });

    pageFlip.on('flip', (e) => {
        updateUI(e.data);
        updateBackdrop(backdrop, images, e.data + 1);
        saveProgress(e.data + 1);
        pageWindow.maybeExtend(e.data);
    });

    pageFlip.loadFromImages(pageWindow.initialImages);

    prevBtn.addEventListener('click', () => pageFlip.flipPrev());
    nextBtn.addEventListener('click', () => pageFlip.flipNext());

    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') pageFlip.flipNext();
        if (e.key === 'ArrowLeft') pageFlip.flipPrev();
    });
});
