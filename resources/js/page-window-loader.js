/**
 * page-flip normally receives the full list of page image URLs up front via
 * loadFromImages(). Each page image now goes through an authenticated Laravel
 * route (real per-request overhead: auth check + DB query + file read) instead
 * of an instant static file — fine for a 20-page book, but a 600+ page book would
 * try to fetch hundreds of images before the reader even finishes opening.
 *
 * This progressively grows the set of images actually handed to page-flip,
 * extending it (via updateFromImages) as the student reads further, instead of
 * loading the whole book at once. Verified empirically that updateFromImages()
 * preserves the current page position, as long as it isn't called while a flip
 * animation is still mid-transition — calling it from the 'flip' event handler
 * (which fires after the animation settles) is safe.
 */
const WINDOW_SIZE = 40;
const EXTEND_THRESHOLD = 10;

export function createPageWindow(pageFlip, allImages, startPage = 1) {
    let loadedCount = Math.min(allImages.length, Math.max(WINDOW_SIZE, startPage + EXTEND_THRESHOLD));

    return {
        initialImages: allImages.slice(0, loadedCount),

        // Call from the 'flip' event handler with the new current page index (0-based).
        maybeExtend(currentPageIndex) {
            if (loadedCount >= allImages.length) return;
            if (currentPageIndex < loadedCount - EXTEND_THRESHOLD) return;

            loadedCount = Math.min(allImages.length, loadedCount + WINDOW_SIZE);
            pageFlip.updateFromImages(allImages.slice(0, loadedCount));
        },
    };
}
