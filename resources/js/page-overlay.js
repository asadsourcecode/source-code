/**
 * page-flip renders every page onto a <canvas> via drawImage(), not as individual
 * DOM elements — so overlaying real HTML on a specific page requires converting
 * between screen pixels and page-relative percentages ourselves.
 *
 * getBoundsRect() returns the "book" rect in the canvas's own internal pixel-buffer
 * coordinate space, which is normally smaller than the canvas element itself (the
 * book is centered/letterboxed within it once container size and page aspect ratio
 * don't match exactly). scaleX/scaleY below convert that internal space into actual
 * on-screen CSS pixels, so this still works correctly under devicePixelRatio scaling.
 */
function getBookGeometry(pageFlip, canvasEl) {
    const bounds = pageFlip.getBoundsRect();
    const orientation = pageFlip.getOrientation();
    const canvasRect = canvasEl.getBoundingClientRect();
    const innerCanvas = canvasEl.querySelector('canvas') || canvasEl;

    const scaleX = canvasRect.width / (innerCanvas.width || canvasRect.width);
    const scaleY = canvasRect.height / (innerCanvas.height || canvasRect.height);

    return {
        orientation,
        screenLeft: canvasRect.left + bounds.left * scaleX,
        screenTop: canvasRect.top + bounds.top * scaleY,
        pageWidth: bounds.pageWidth * scaleX,
        pageHeight: bounds.height * scaleY,
    };
}

/**
 * Convert a click/mouse event's clientX/clientY into a page-relative position.
 * Returns null if the point falls outside the book (e.g. in the letterboxed margin).
 */
export function pointToPagePercent(pageFlip, canvasEl, clientX, clientY) {
    const geo = getBookGeometry(pageFlip, canvasEl);
    const bookX = clientX - geo.screenLeft;
    const bookY = clientY - geo.screenTop;

    const totalWidth = geo.orientation === 'landscape' ? geo.pageWidth * 2 : geo.pageWidth;
    if (bookX < 0 || bookX > totalWidth || bookY < 0 || bookY > geo.pageHeight) {
        return null;
    }

    const isRight = geo.orientation === 'landscape' && bookX >= geo.pageWidth;
    const localX = isRight ? bookX - geo.pageWidth : bookX;

    return {
        side: isRight ? 'right' : 'left',
        xPercent: Math.max(0, Math.min(100, (localX / geo.pageWidth) * 100)),
        yPercent: Math.max(0, Math.min(100, (bookY / geo.pageHeight) * 100)),
    };
}

/**
 * Convert a stored xPercent/yPercent (plus which side of the spread) back into an
 * absolute on-screen point — used to position a pin marker over the canvas.
 */
export function pagePercentToScreenPoint(pageFlip, canvasEl, side, xPercent, yPercent) {
    const geo = getBookGeometry(pageFlip, canvasEl);
    const sideOffset = side === 'right' ? geo.pageWidth : 0;

    return {
        left: geo.screenLeft + sideOffset + (xPercent / 100) * geo.pageWidth,
        top: geo.screenTop + (yPercent / 100) * geo.pageHeight,
    };
}

/**
 * Given the currently visible spread (leftPageNumber = 1-indexed page shown on the
 * left, i.e. the 'flip' event's e.data + 1), determine which side a given page
 * number is on right now, or null if it isn't part of the visible spread at all.
 */
export function pageSideInSpread(orientation, leftPageNumber, totalPages, pageNumber) {
    if (pageNumber === leftPageNumber) return 'left';
    if (orientation === 'landscape' && pageNumber === leftPageNumber + 1 && pageNumber <= totalPages) return 'right';
    return null;
}

/**
 * The current on-screen size (CSS pixels) of a single page — used to convert a
 * resize-drag's pixel delta into a percentage width/height to store.
 */
export function getPageDimensions(pageFlip, canvasEl) {
    const geo = getBookGeometry(pageFlip, canvasEl);
    return { pageWidth: geo.pageWidth, pageHeight: geo.pageHeight };
}

/**
 * The book is letterboxed whenever its aspect ratio doesn't exactly match the
 * viewer panel's — rather than leaving that as a flat void, show a blurred,
 * zoomed copy of the current page filling the whole panel behind it (the same
 * trick video/photo apps use for mismatched aspect ratios).
 */
export function updateBackdrop(backdropEl, images, leftPageNumber) {
    if (!backdropEl) return;
    const image = images[leftPageNumber - 1];
    if (image) {
        backdropEl.style.backgroundImage = `url("${image}")`;
    }
}
