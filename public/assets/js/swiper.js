{
    /* <script src="{{ asset('asset/js/main-swiper.js') }}"></script> */
}
document.addEventListener( "DOMContentLoaded", function () {
    var swiper = new Swiper( ".mainSwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    } )
} )
document.addEventListener( "DOMContentLoaded", function () {
    var swiper = new Swiper( ".blogsSwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    } )
} )
document.addEventListener( "DOMContentLoaded", function () {
    var swiper = new Swiper( ".ratingSwiper", {
        loop: true,
        pagination: {
            el: ".swiper-pagination",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            // when window width is >= 480px
            480: {
                slidesPerView: 1,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1336: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1720: {
                slidesPerView: 3.5,
                spaceBetween: 30,
            },
        },
    } )

    function setEqualHeight () {
        let slides = document.querySelectorAll( '.ratingSwiper .swiper-slide' )
        let maxHeight = 0

        slides.forEach( slide => {
            slide.style.height = ''
            if ( slide.offsetHeight > maxHeight ) {
                maxHeight = slide.offsetHeight
            }
        } )

        slides.forEach( slide => {
            slide.style.height = maxHeight + 'px'
        } )
    }
    setEqualHeight()
    window.addEventListener( 'resize', setEqualHeight )
} )

