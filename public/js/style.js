document.getElementById('burger').addEventListener('click', function() {
    const menu = document.getElementById('menu');

    menu.classList.toggle('open');

    if (menu.classList.contains('open')) {

        // Si le menu est ouvert il declanche l'animation 
        const menuItems = menu.querySelectorAll('a');
        
        menuItems.forEach((item, index) => {
            setTimeout(() => {
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
                // Rajoute du delai pour l'apparition de chaque item a du menu ouvert
            }, index * 100); 
        });
    } else {
        
        // Si le menu est fermé , reset le style comme defini en css
        const menuItems = menu.querySelectorAll('a');
        menuItems.forEach((item) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(-50px)'; 
        });
    }
});
