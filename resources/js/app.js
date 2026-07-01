document.addEventListener('DOMContentLoaded', function () {

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

    if (menuButton) menuButton.addEventListener('click', openDrawer);
    if (closeBtn)   closeBtn.addEventListener('click', closeDrawer);
    if (overlay)    overlay.addEventListener('click', closeDrawer);

    // Desktop nav dropdowns
    document.querySelectorAll('.desktop-dropdown-parent').forEach(function (parent) {
        var dropdown = parent.querySelector('.desktop-dropdown');
        if (!dropdown) return;
        parent.addEventListener('mouseenter', function () { dropdown.style.display = 'block'; });
        parent.addEventListener('mouseleave', function () { dropdown.style.display = ''; });
    });

    // Accordion: + / - toggle for items with children
    document.querySelectorAll('.drawer-accordion-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
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

});
