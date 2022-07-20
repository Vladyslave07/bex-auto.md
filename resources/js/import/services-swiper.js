import {Swiper} from './swiper';

export default function() {
    new Swiper('.services-swiper', {
        slidesPerView: 1.1,
        spaceBetween: 20,
        centeredSlides: true,
        watchOverflow: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {
            660: {
                slidesPerView: 2,
                spaceBetween: 30,
                centeredSlides: false
            },
            900: {
                slidesPerView: 3,
                spaceBetween: 30,
                centeredSlides: false
            },
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
                centeredSlides: false
            }
        }
    });
}