import {Swiper} from './swiper';

export default function() {
    new Swiper('.product-swiper', {
        slidesPerView: 1.1,
        spaceBetween: 20,
        centeredSlides: true,
        watchOverflow: true,
        pagination: {
            el: '.swiper-bullets',
            type:'custom',
            clickable: true,
            renderCustom: function(swiper, current, total) {
                var text = "<ul>";
                for (var i = 1; i <= total; i++) {
                    if (current == i) {
                        text += '<li class="swiper-pagination-bullet active">'+i+'</li>';
                    }
                    else {
                        if (i == 1 || (i == 2 && current < 3) || i == current || i == total || (current > total-2 && i > total-2)) {
                            text += '<li class="swiper-pagination-bullet">'+i+'</li>';
                        }
                        else {
                            if (total > 3 && i == total-1 || (total > 3 && current > total-2 && i == 2)) {
                                text += '<li class="swiper-pagination-bullet">...</li>';
                            }
                            else {
                                text += '<li class="swiper-pagination-bullet hide">'+i+'</li>';
                            }
                        }
                    }
                }
                text += "</ul>";
                 return text;
            }
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            clickable: true,
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