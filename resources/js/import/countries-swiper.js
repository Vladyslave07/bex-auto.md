import {Swiper} from './swiper';

export default function() {
    new Swiper('.countries-swiper', {
        slidesPerView: "auto",
        spaceBetween: 15,
        centeredSlides: true,
        watchOverflow: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 0,
                centeredSlides: false
            },
            900: {
                slidesPerView: 4,
                spaceBetween: 0,
                centeredSlides: false
            },
            1200: {
                slidesPerView: 5,
                spaceBetween: 30,
                centeredSlides: false
            }
        },
        on: {
            init: function (el) {
                if (this.slides.length < 5) {
                    this.$el.addClass('center');
                }
            }
        }
    });
}