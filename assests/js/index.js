$('#preloader').show();
$(document).ready(function(){
    $('#preloader').hide();

ScrollReveal({
    reset: true,
    distance: '60px',
    duration: 2500,
    delay: 400
});
ScrollReveal().reveal('.heading-new,.profile', { delay: 500 });
ScrollReveal().reveal('.new', { delay: 500 });
ScrollReveal().reveal('.mine', { delay: 500, origin: 'top' });
ScrollReveal().reveal('footer', { delay: 600, origin: 'bottom' });
ScrollReveal().reveal('heading1', { delay: 500 });
ScrollReveal().reveal('.fine', { delay: 500, origin: 'left', interval: 200 });
ScrollReveal().reveal('.fine2', { delay: 500, origin: 'top' });
ScrollReveal().reveal('.fine3', { delay: 500, origin: 'right' });

});