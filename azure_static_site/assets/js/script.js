document.addEventListener('DOMContentLoaded', () => {
    // Menu Toggle Logic for Mobile
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav-left');
    const body = document.body;

    if (toggle && nav) {
        // Toggle Menu
        toggle.addEventListener('click', (e) => {
            e.stopPropagation();
            nav.classList.toggle('active');
            toggle.classList.toggle('open');
            updateHamburgerIcon(toggle);
        });

        // Close when clicking outside specific areas
        document.addEventListener('click', (e) => {
            if (nav.classList.contains('active') && !nav.contains(e.target) && !toggle.contains(e.target)) {
                // Ensure we don't close if clicking submenu items inside
                nav.classList.remove('active');
                toggle.classList.remove('open');
                updateHamburgerIcon(toggle);
            }
        });

        // Close when clicking a link (unless it's a submenu toggle)
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                toggle.classList.remove('open');
                updateHamburgerIcon(toggle);
            });
        });

        // --- PROPER MOBILE SUBMENU LOGIC ---
        // Select all submenu toggle buttons
        const submenuToggles = document.querySelectorAll('.submenu-toggle');
        submenuToggles.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent closing nav

                // Find parent LI first
                const parentLi = btn.closest('li');
                if (parentLi) {
                    // Find the dropdown menu within this LI
                    const submenu = parentLi.querySelector('.dropdown-menu');

                    if (submenu) {
                        submenu.classList.toggle('open');
                        btn.classList.toggle('active');
                    }
                }
            });
        });

    }

    function updateHamburgerIcon(btn) {
        const spans = btn.querySelectorAll('span');
        if (btn.classList.contains('open')) {
            spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
        } else {
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }
    }

    // Smooth Scroll for Anchors
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId && targetId !== '#') {
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    // Auto Update year in footer
    const yearSpan = document.querySelector('.current-year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }
});
