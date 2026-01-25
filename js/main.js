document.addEventListener('DOMContentLoaded', () => {
    console.log('Roydon D\'Souza - Setup Loaded');

    const htmlElement = document.documentElement;
    const themeCheckbox = document.getElementById('theme-checkbox');
    const savedTheme = localStorage.getItem('theme');
    const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    // Initialize state
    if (savedTheme) {
        htmlElement.setAttribute('data-theme', savedTheme);
        if (themeCheckbox) {
            themeCheckbox.checked = savedTheme === 'dark';
        }
    } else if (systemPrefersDark) {
        htmlElement.setAttribute('data-theme', 'dark');
        if (themeCheckbox) {
            themeCheckbox.checked = true;
        }
    }

    // Toggle event
    if (themeCheckbox) {
        themeCheckbox.addEventListener('change', (e) => {
            const newTheme = e.target.checked ? 'dark' : 'light';
            htmlElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
        });
    }

    // Add active state to nav links on scroll
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('nav ul li a');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });
});
