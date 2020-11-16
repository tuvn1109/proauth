$(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        margin: 30,
        nav: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 10,
            },
            768: {
                items: 2,
                stagePadding: 30,
            },
            1200: {
                items: 3,
                stagePadding: 160,
            }
        },
    });
});
