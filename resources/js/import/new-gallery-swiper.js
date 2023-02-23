import {Swiper} from './swiper';

export default function() {
    const swiper = new Swiper('.gallery-thumbs', {
        slidesPerView: 'auto',
        spaceBetween: 20
    });
    new Swiper('.gallery-swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        autoHeight: true,
        watchSlidesProgress: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            clickable: true,
        },
        thumbs: {
            swiper: swiper,
        }
    });
}