// menu burger 

document.addEventListener("DOMContentLoaded", () => {
    const burger = document.getElementById("burger");
    const menu = document.querySelector(".menu");

    burger.addEventListener("click", () => {
        burger.classList.toggle("open");
        menu.classList.toggle("open");
    });
});
