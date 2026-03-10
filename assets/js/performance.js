document.addEventListener('DOMContentLoaded', () => {
    const images = document.querySelectorAll('img');

    images.forEach((img, index) => {
        if (!img.hasAttribute('decoding')) {
            img.setAttribute('decoding', 'async');
        }

        if (img.hasAttribute('loading')) {
            return;
        }

        const inHero = Boolean(
            img.closest('.hero, .hero-bg, .hero-image-wrapper, .sust-hero, .segafredo-hero, .pacaembu-hero, .novasuissa-hero')
        );

        img.setAttribute('loading', inHero || index < 2 ? 'eager' : 'lazy');
    });
});
