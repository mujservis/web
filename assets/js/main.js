/**
 * Hlavní JavaScript soubor
 *
 * Obsahuje obecné skripty pro téma
 *
 * @package Web
 */

(function() {
    'use strict';

    // Smooth scroll pro odkazy s hashem
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            
            // Pokud je odkaz jen #, nescrollujeme
            if (targetId === '#') {
                return;
            }
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Lazy loading pro obrázky (fallback pro prohlížeče bez nativní podpory)
    if ('loading' in HTMLImageElement.prototype) {
        // Prohlížeč podporuje lazy-loading
        document.querySelectorAll('img[loading="lazy"]').forEach(img => {
            img.src = img.dataset.src;
        });
    } else {
        // Fallback pro starší prohlížeče
        const lazyImages = document.querySelectorAll('img[data-src]');
        
        if (lazyImages.length > 0) {
            let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImageObserver.unobserve(lazyImage);
                    }
                });
            });
            
            lazyImages.forEach(function(lazyImage) {
                lazyImageObserver.observe(lazyImage);
            });
        }
    }

    // Detekce prohlížeče pro specifické styly
    const html = document.documentElement;
    const userAgent = navigator.userAgent.toLowerCase();
    
    if (userAgent.indexOf('safari') !== -1 && userAgent.indexOf('chrome') === -1) {
        html.classList.add('is-safari');
    } else if (userAgent.indexOf('firefox') !== -1) {
        html.classList.add('is-firefox');
    } else if (userAgent.indexOf('edge') !== -1) {
        html.classList.add('is-edge');
    }
})();