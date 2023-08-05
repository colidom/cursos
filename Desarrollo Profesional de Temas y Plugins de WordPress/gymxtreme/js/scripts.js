function gymXtremeWordpress() {
    if (document.querySelector(".swiper")) {
        const options = {
            loop: true,
            autoplay: {
                delay: 3000,
            },
        };
        new Swiper(".swiper", options);
    }

    // Wrap every letter in a span
    var textWrapper = document.querySelector(".ml2");

    if (textWrapper) {
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime
            .timeline({ loop: true })
            .add({
                targets: ".ml2 .letter",
                scale: [4, 1],
                opacity: [0, 1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: (el, i) => 70 * i,
            })
            .add({
                targets: ".ml2",
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000,
            });
    }

    const hamburger = document.querySelector(".hamburger-menu svg");
    hamburger.addEventListener("click", function () {
        const mainMenu = document.querySelector(".menu-container");
        mainMenu.classList.toggle("show");
    });
}

document.addEventListener("DOMContentLoaded", gymXtremeWordpress);

window.onscroll = function () {
    const scroll = window.scrollY;
    const navBar = document.querySelector(".navigation-bar");

    if (scroll > 300) {
        navBar.classList.add("fixed-top");
    } else {
        navBar.classList.remove("fixed-top");
    }
};
