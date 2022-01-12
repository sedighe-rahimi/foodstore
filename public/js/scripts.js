$('.owl-carousel').owlCarousel({
    rtl: true,
    nav: true,
    items: 4,
    autoplay: true,
    loop: true,
    responsive: {0: {items: 1},768: {items: 4}},
    navText: ['<i class="fas fa-angle-double-left"></i>','<i class="fas fa-angle-double-right"></i>'],
    loop: $(this).find('.owl-item').length > 1 ? true : false,
})


// $('#owl-carousel1').owlCarousel({
//     rtl: true,
//     nav: true,
//     items: 4,
//     autoplay: true,
//     loop: true,
//     responsive: {0: {items: 1},768: {items: 4}},
//     navText: ['<i class="fas fa-angle-double-left"></i>','<i class="fas fa-angle-double-right"></i>'],
//     onInitialize: function (event) {
//         if ($('.owl-carousel .item').length <= 1) {
//            this.settings.loop = false;
//         }
//     }
// })

// $('#owl-carousel2').owlCarousel({
//     rtl: true,
//     nav: true,
//     items: 3,
//     autoplay: true,
//     loop: true,
//     responsive: {0: {items: 1},768: {items: 3}},
//     navText: ['<i class="fas fa-angle-double-left"></i>','<i class="fas fa-angle-double-right"></i>'],
//     onInitialize: function (event) {
//         if ($('.owl-carousel .item').length <= 1) {
//            this.settings.loop = false;
//         }
//     }
// })

// $('#owl-carousel3').owlCarousel({
//     rtl: true,
//     nav: true,
//     items: 4,
//     autoplay: true,
//     loop: true,
//     responsive: {0: {items: 1},768: {items: 4}},
//     navText: ['<i class="fas fa-angle-double-left"></i>','<i class="fas fa-angle-double-right"></i>'],
//     onInitialize: function (event) {
//         if ($('.owl-carousel .item').length <= 1) {
//            this.settings.loop = false;
//         }
//     }
// })