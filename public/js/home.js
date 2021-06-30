function sliderInit() {
    $(".product-carousel").slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: true,
        focusOnSelect: true,
        arrow: false,
        mobileFirst: true,
        responsive: [
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true
                }
            },
            {
                breakpoint: 920,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true
                }
            },
            {
                breakpoint: 720,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 0,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}
// function destroySlider() {
//     if ($(".product-carousel").hasClass("slick-initialized")) {
//         $(".product-carousel").slick("unslick");
//         $(".product-carousel").slick("remove");
//     }
// }
// function sliderResize() {
//     $(window).on("resize", function() {
        
//         let clientWidth = $(window).width();

//         if (clientWidth < 480) {
//             destroySlider();
//         } else {
//             if (!$(".product-carousel").hasClass("slick-initialized")) {
//                 sliderInit();
//             }
//             $(".product-carousel").slick("setPosition");
//         }
//     });
// }
