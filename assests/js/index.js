$('#preloader').show();
$('#loader').show();
$(document).ready(function(){
    $('#preloader').hide();
    $('#loader').hide();
document.addEventListener('DOMContentLoaded', () => {
    anime({
        targets: '.logo',
        translateX: [-200, 0],
        easing: 'easeOutExpo',
        duration: 1000,
        delay: 1000,
        opacity: [0, 1],

    })
    anime({
        targets: 'nav a',
        translateX: [-50, 0],
        easing: 'easeOutExpo',
        duration: 1200,
        delay: 1000,
        opacity: [0, 1],

    })



})

ScrollReveal({
    reset: true,
    distance: '60px',
    duration: 2500,
    delay: 400
});

ScrollReveal().reveal('.heading-new,.profile', { delay: 500 });
ScrollReveal().reveal('.new', { delay: 500 });
ScrollReveal().reveal('.mine', { delay: 500, origin: 'top' });
// ScrollReveal().reveal('.btn-1',{delay:500});
ScrollReveal().reveal('footer', { delay: 600, origin: 'bottom' });
ScrollReveal().reveal('heading1', { delay: 500 });
// ScrollReveal().reveal('.hello',{delay:500,origin: 'left'});
ScrollReveal().reveal('.fine', { delay: 500, origin: 'left', interval: 200 });
ScrollReveal().reveal('.fine2', { delay: 500, origin: 'top' });
ScrollReveal().reveal('.fine3', { delay: 500, origin: 'right' });

});