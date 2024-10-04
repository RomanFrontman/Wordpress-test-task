document.addEventListener('DOMContentLoaded', function () {

    var menuBtn = document.querySelector('.header__menu-btn');
    var headerControlsWrap = document.querySelector('.header-controls-wrap');
    var mainNavLinks = document.querySelectorAll('.main-nav a');

    menuBtn.addEventListener('click', function () {
        if (menuBtn.classList.contains('is-active')) {
            menuBtn.classList.remove('is-active');
            headerControlsWrap.classList.remove('is-active');
            document.body.classList.add('loaded');
        } else {
            menuBtn.classList.add('is-active');
            headerControlsWrap.classList.add('is-active');
            document.body.classList.remove('loaded');
        }
    });

    mainNavLinks.forEach(function (link) {
        link.addEventListener('click', function () {
            menuBtn.classList.remove('is-active');
            document.body.classList.add('loaded');
            headerControlsWrap.classList.remove('is-active');
        });
    });
});

document.querySelector('.nav-btn--next').addEventListener('click', function() {
    window.scrollBy({
        top: window.innerHeight * 0.9, // 90vh
        behavior: 'smooth'
    });
});
