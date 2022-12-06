import {Swiper} from './swiper';

export default function() {
    let init = false,
        swiper

    function swiperBranches() {
        if (window.innerWidth <= 992) {
            if (!init) {
                init = true;
                swiper =  new Swiper('.branches-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    watchOverflow: true,
                    autoHeight: true,
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
                    }
                });
            }
        } else if (init) {
            swiper.forEach((el) => {
                el.destroy();
            });
            init = false;
        }
    }
    swiperBranches();
    window.addEventListener("resize", swiperBranches);
}