function bindOnce(el, event, handler) {
    if (!el || el.dataset['bound' + event] === '1') return;
    el.dataset['bound' + event] = '1';
    el.addEventListener(event, handler);
}

function initPageInteractions() {

    const menuButton = document.getElementById('mobile-menu-button');
    const drawer = document.getElementById('mobile-drawer');
    const overlay = document.getElementById('drawer-overlay');
    const closeBtn = document.getElementById('drawer-close');

    function openDrawer() {
        drawer.style.transform = 'translateX(0)';
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        drawer.style.transform = 'translateX(-100%)';
        overlay.style.display = 'none';
        document.body.style.overflow = '';
    }

    if (menuButton) bindOnce(menuButton, 'click', openDrawer);
    if (closeBtn)   bindOnce(closeBtn, 'click', closeDrawer);
    if (overlay)    bindOnce(overlay, 'click', closeDrawer);

    // Desktop nav dropdowns
    document.querySelectorAll('.desktop-dropdown-parent').forEach(function (parent) {
        var dropdown = parent.querySelector('.desktop-dropdown');
        if (!dropdown) return;
        bindOnce(parent, 'mouseenter', function () { dropdown.style.display = 'block'; });
        bindOnce(parent, 'mouseleave', function () { dropdown.style.display = ''; });
    });

    // Accordion: + / - toggle for items with children
    document.querySelectorAll('.drawer-accordion-btn').forEach(function (btn) {
        bindOnce(btn, 'click', function () {
            const content = btn.nextElementSibling;
            const plus = btn.querySelector('.drawer-plus');
            const isOpen = !content.classList.contains('hidden');

            // Close all others
            document.querySelectorAll('.drawer-accordion-content').forEach(function (el) {
                el.classList.add('hidden');
            });
            document.querySelectorAll('.drawer-plus').forEach(function (el) {
                el.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />';
            });

            if (!isOpen) {
                content.classList.remove('hidden');
                plus.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />';
            }
        });
    });

    // Reschedule Meeting pop-up
    const rescheduleModal = document.getElementById('reschedule-modal');
    if (rescheduleModal) {
        function openRescheduleModal() {
            rescheduleModal.classList.remove('hidden');
            rescheduleModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeRescheduleModal() {
            rescheduleModal.classList.add('hidden');
            rescheduleModal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.js-open-reschedule').forEach(function (btn) {
            bindOnce(btn, 'click', openRescheduleModal);
        });
        document.querySelectorAll('.js-close-reschedule').forEach(function (btn) {
            bindOnce(btn, 'click', closeRescheduleModal);
        });
        bindOnce(rescheduleModal, 'click', function (e) {
            if (e.target === rescheduleModal) closeRescheduleModal();
        });
    }

    // Delete Announcement pop-up
    const deleteAnnouncementModal = document.getElementById('delete-announcement-modal');
    if (deleteAnnouncementModal) {
        const deleteAnnouncementText = document.getElementById('delete-announcement-text');

        function openDeleteAnnouncementModal(title) {
            if (deleteAnnouncementText) {
                deleteAnnouncementText.textContent = title
                    ? 'Are you sure you want to delete "' + title + '"?'
                    : 'Are you sure you want to delete this Announcement?';
            }
            deleteAnnouncementModal.classList.remove('hidden');
            deleteAnnouncementModal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeDeleteAnnouncementModal() {
            deleteAnnouncementModal.classList.add('hidden');
            deleteAnnouncementModal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('.js-open-delete-announcement').forEach(function (btn) {
            bindOnce(btn, 'click', function () {
                openDeleteAnnouncementModal(btn.dataset.title);
            });
        });
        document.querySelectorAll('.js-close-delete-announcement').forEach(function (btn) {
            bindOnce(btn, 'click', closeDeleteAnnouncementModal);
        });
        bindOnce(deleteAnnouncementModal, 'click', function (e) {
            if (e.target === deleteAnnouncementModal) closeDeleteAnnouncementModal();
        });
    }

}

document.addEventListener('DOMContentLoaded', initPageInteractions);

// wire:navigate swaps the page without a full reload, so DOMContentLoaded
// only fires once. Re-run the same init after every Livewire SPA navigation
// so freshly-swapped-in elements (modals, drawers, etc.) get their listeners.
// bindOnce() guards against double-binding on the very first load, since
// livewire:navigated also fires once immediately after initial page load.
document.addEventListener('livewire:navigated', initPageInteractions);
