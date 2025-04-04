/**
 * Soubor pro obsluhu navigace
 *
 * Obsahuje logiku pro mobilní menu a přístupnost navigace
 *
 * @package Web
 */

(function() {
    'use strict';

    // Proměnné pro navigaci
    const siteNavigation = document.getElementById('site-navigation');
    const button = siteNavigation ? siteNavigation.querySelector('.menu-toggle') : null;
    const menu = siteNavigation ? siteNavigation.querySelector('#primary-menu') : null;

    // Pokud něco z potřebných elementů chybí, ukončíme
    if (!siteNavigation || !button || !menu) {
        return;
    }

    // Skryjeme menu (výchozí stav pro mobilní zařízení)
    menu.setAttribute('aria-hidden', 'true');
    
    // Pokud menu nemá atribut aria-expanded, přidáme ho
    if (!button.getAttribute('aria-expanded')) {
        button.setAttribute('aria-expanded', 'false');
    }

    // Přepínání menu po kliknutí na tlačítko
    button.addEventListener('click', function() {
        const isExpanded = button.getAttribute('aria-expanded') === 'true';
        
        // Přepneme stav menu
        siteNavigation.classList.toggle('toggled');
        button.setAttribute('aria-expanded', !isExpanded);
        menu.setAttribute('aria-hidden', isExpanded);
    });

    // Zavření menu po kliknutí na odkaz (pro mobilní zařízení)
    document.addEventListener('click', function(event) {
        const isClickInside = siteNavigation.contains(event.target);

        if (!isClickInside && siteNavigation.classList.contains('toggled')) {
            siteNavigation.classList.remove('toggled');
            button.setAttribute('aria-expanded', 'false');
            menu.setAttribute('aria-hidden', 'true');
        }
    });

    // Přístupnost pro podmenu
    const subMenuParents = siteNavigation.querySelectorAll('.menu-item-has-children');

    subMenuParents.forEach(function(parent) {
        const subMenu = parent.querySelector('.sub-menu');
        const dropdownToggle = document.createElement('button');
        
        // Vytvoříme tlačítko pro rozbalení podmenu
        dropdownToggle.className = 'dropdown-toggle';
        dropdownToggle.setAttribute('aria-expanded', 'false');
        
        // Přidáme screen-reader text
        const screenReaderSpan = document.createElement('span');
        screenReaderSpan.className = 'screen-reader-text';
        screenReaderSpan.textContent = 'Rozbalit podmenu';
        
        dropdownToggle.appendChild(screenReaderSpan);
        parent.appendChild(dropdownToggle);

        // Přidáme funkcionalitu pro rozbalení podmenu
        dropdownToggle.addEventListener('click', function(event) {
            event.preventDefault();
            
            const isExpanded = dropdownToggle.getAttribute('aria-expanded') === 'true';
            
            dropdownToggle.setAttribute('aria-expanded', !isExpanded);
            subMenu.classList.toggle('toggled-on');
            
            // Aktualizujeme text pro čtečky obrazovky
            screenReaderSpan.textContent = isExpanded ? 'Rozbalit podmenu' : 'Sbalit podmenu';
        });
    });

    // Přidání třídy pro JS
    document.body.classList.add('js');
})();