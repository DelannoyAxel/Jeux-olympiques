document.getElementById('burger').addEventListener('click', function () {
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
// ---------------------------
// redirection des pages tel

document.querySelectorAll('.actuRow').forEach(function (actu) {
    actu.addEventListener('click', function () {
        const url = this.getAttribute('data-url');
        if (url) {
            window.location.href = url;
        }
    });
});

// redirection des pages pc
document.addEventListener('DOMContentLoaded', function (actu) {
    document.querySelectorAll('.rowInfo div, .rowInfo2 div').forEach(function (div) {
        div.addEventListener('click', function () {
            const url = this.getAttribute('data-url');
            if (url) {
                window.location.href = url;
            }
        });
    });
});

// menu mon compte tel


// menu mon compte PC
document.addEventListener('DOMContentLoaded', (event) => {
    const btnMonCompte = document.querySelectorAll(".btnMonCompte");
    const menuHiddenCompte = document.querySelectorAll(".menuHiddenCompte");

    let timeout;

    btnMonCompte.forEach((btn, index) => {
        btn.addEventListener('mouseenter', function () {
            clearTimeout(timeout);
            menuHiddenCompte[index].classList.add("show");
        });

        btn.addEventListener('mouseleave', function () {
            timeout = setTimeout(function () {
                menuHiddenCompte[index].classList.remove("show");
            }, 300);
        });

        menuHiddenCompte[index].addEventListener('mouseenter', function () {
            clearTimeout(timeout);
            menuHiddenCompte[index].classList.add("show");
        });

        menuHiddenCompte[index].addEventListener('mouseleave', function () {
            timeout = setTimeout(function () {
                menuHiddenCompte[index].classList.remove("show");
            }, 300);
        });
    });
});



// -------------
// PAGE PROFIL
// -------------

const profilSection = document.querySelector(".profilSection")
const profilSectionUpdate = document.querySelector(".profilSectionUpdate")

document.getElementById("editButton").addEventListener("click", function(){
    profilSection.style.display = "none";
    profilSectionUpdate.style.display = "flex";
});


document.getElementById("majProfil").addEventListener("click", function(){
profilSectionUpdate.style.display = "none"
profilSection.style.display = "flex"
});
