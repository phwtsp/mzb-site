document.addEventListener('DOMContentLoaded', () => {
    // Menu Toggle Logic for Mobile
    const toggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('.nav-left'); // Fixed selector
    const body = document.body;

    if (toggle && nav) {
        // Toggle Menu
        toggle.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent immediate closing
            nav.classList.toggle('active');
            toggle.classList.toggle('open');
            updateHamburgerIcon(toggle);
        });

        // Close when clicking outside
        document.addEventListener('click', (e) => {
            if (nav.classList.contains('active') && !nav.contains(e.target) && !toggle.contains(e.target)) {
                nav.classList.remove('active');
                toggle.classList.remove('open');
                updateHamburgerIcon(toggle);
            }
        });

        // Close when clicking a link inside the menu
        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('active');
                toggle.classList.remove('open');
                updateHamburgerIcon(toggle);
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
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
