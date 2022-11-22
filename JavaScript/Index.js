// Animations
function preloadingFunction() {
    var Spinning_animation;
    var Bar_animation;
    var Content_animation;

    Spinning_animation = setTimeout(showSpinning, 800);
    Bar_animation = setTimeout(showBar, 2200);
    Content_animation = setTimeout(showContent, 2500);
}

function showSpinning() {
    document.getElementById("loading").style.display = "none";
    document.getElementById("spinner").style.display = "none";
    document.getElementById("AfterLoading").style.display = "block";
}

function showBar() {
    document.getElementById("box").style.display = "none";
    // document.getElementsByClassName("box1").style.display = "none";
    // document.getElementsByClassName("box2").style.display = "none";
}

// Navigation bar effects on scroll
window.addEventListener("scroll", function () {
    const header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
});

// Service Section - Modal
const serviceModals = document.querySelectorAll(".service-modal");
const learnmoreBtns = document.querySelectorAll(".learn-more-btn");
const modalCloseBtns = document.querySelectorAll(".modal-close-btn");

var modal = function (modalClick) {
    serviceModals[modalClick].classList.add("active");
}

learnmoreBtns.forEach((learnmoreBtn, i) => {
    learnmoreBtn.addEventListener("click", () => {
        modal(i);
    });
});

modalCloseBtns.forEach((modalCloseBtn) => {
    modalCloseBtn.addEventListener("click", () => {
        serviceModals.forEach((modalView) => {
            modalView.classList.remove("active");
        });
    });
});

// Portfolio Section - Modal
function magnify(imglink) {
    $("#img_here").css("background", `url('${imglink}') center center`);
    $("#magnify").css("display", "flex");
    $("#magnify").addClass("animated fadeIn");
    setTimeout(function () {
        $("#magnify").removeClass("animated fadeIn");
    }, 800);
}

function closemagnify() {
    $("#magnify").addClass("animated fadeOut");
    setTimeout(function () {
        $("#magnify").css("display", "none");
        $("#magnify").removeClass("animated fadeOut");
        $("#img_here").css("background", `url('') center center`);
    }, 800);
}

// Our clients - swiper
var swiper = new Swiper(".client-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Light & Dark Theme
const themeBtn = document.querySelector(".theme-btn");

themeBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");
    themeBtn.classList.toggle("sun");

    localStorage.setItem("saved-theme", getCurrentTheme());
    localStorage.setItem("saved-icon", getCurrentIcon());
});

const getCurrentTheme = () => document.body.classList.contains("dark-theme") ? "dark" : "light";
const getCurrentIcon = () => document.body.classList.contains("sun") ? "sun" : "moon";

const savedTheme = localStorage.getItem("saved-theme");
const savedIcon = localStorage.getItem("saved-icon");

if (savedTheme) {
    document.body.classList[savedTheme === "dark" ? "add" : "remove"]("dark-theme");
    themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
}

// Scroll to top button
const scrollTopBtn = document.querySelector(".scrollToTop-btn");
window.addEventListener("scroll", function () {
    scrollTopBtn.classList.toggle("active", window.scrollY > 500);
});

// Navigation menu items active on page scroll
window.addEventListener("scroll", () => {
    const sections = document.querySelectorAll("section");
    const scrollY = window.pageYOffset;

    sections.forEach(current => {
        let sectionHeight = current.offsetHeight;
        let sectionTop = current.offsetTop - 50;
        let id = current.getAttribute("id");

        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document.querySelector(".nav-items a[href*=" + id + "]").classList.add("active");
        } else {
            document.querySelector(".nav-items a[href*=" + id + "]").classList.remove("active");
        }
    });
});

//Responsive Navigation Menu Toggle
const menuBtn = document.querySelector(".nav-menu-btn");
const closeBtn = document.querySelector(".nav-close-btn");
const navigation = document.querySelector(".navigation");
const navItems = document.querySelectorAll(".nav-items a");

menuBtn.addEventListener("click", () => {
    navigation.classList.add("active");
});

closeBtn.addEventListener("click", () => {
    navigation.classList.remove("active");
});

navItems.forEach((navItem) => {
    navItem.addEventListener("click", () => {
        navigation.classList.remove("active");
    });
});

//Scroll Reveal animations options to create revel animations
//  ScrollReveal({
//      reset: true,
//      distance: '60px',
//      duration: 2500,
//      delay: 100
//  });

//Target elements, and specify options to create reveal animations
// ScrollReveal().reveal('.home .info h2, .section-title-01, .section-title-02', 
// { delay: 500, origin: 'left'});
// ScrollReveal().reveal('.home .info h3, .home, .info p, about-info .btn', 
// { delay: 600, origin: 'right'});
// ScrollReveal().reveal('.home .info .btn', 
// { delay: 700, origin: 'bottom'});
// ScrollReveal().reveal('.media-icons i, .contact-left li', 
// { delay: 500, origin: 'left', interval: 200});
// ScrollReveal().reveal('.home-img .about-img', 
// { delay: 500, origin: 'bottom'});
// ScrollReveal().reveal('.about .description, .copy-right', 
// { delay: 600, origin: 'right'});
// ScrollReveal().reveal('.about .professional-list li', 
// { delay: 500, origin: 'right', interval: 200});
// ScrollReveal().reveal('.skills-description, .service-description, .contact-card, .client-swiper, contact-left h2', 
// { delay: 700, origin: 'left'});
// ScrollReveal().reveal('.experience-card, .service-card, .education, .portfolio, .img-card', 
// { delay: 800, origin: 'bottom', interval: 200});
// ScrollReveal().reveal('.footer, .group', 
// { delay: 500, origin: 'top', interval: 200});