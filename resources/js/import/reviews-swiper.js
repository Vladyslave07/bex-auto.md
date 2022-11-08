import {Swiper} from './swiper';

export default function() {
    if(window.innerWidth > 767) {
        SwiperInit();
        function SwiperInit() {
            new Swiper('.reviews-swiper', {
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
                    1150: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                        centeredSlides: false
                    }
                },
                on: {
                    init: function(e) {
                        e.appendSlide(reviewsArr.slice(0, 4));
                        e.slides.forEach((el) => {
                            observer.observe(el.querySelector('.review-text p'));

                        });
                    },
                    slideChange: function (e) {
                        if(e.isEnd && e.slides.length < reviewsArr.length) {
                            e.appendSlide(reviewsArr.slice(e.slides.length, e.slides.length+4));
                            e.slides.forEach((el) => {
                                observer.observe(el.querySelector('.review-text p'));
                            });
                        }
                    }
                }
            });
        }
    }

    const observer = new ResizeObserver(entries => {
        for (let entry of entries) {
            if (entry.target.scrollHeight > entry.contentRect.height) {
                if (!entry.target.nextElementSibling) {
                    entry.target.insertAdjacentHTML('afterend', '<div class="toggle-btn" data-text="Свернуть">Детальнее</div>');
                }
            }
            else {
                if(entry.contentRect.height <= 105) {
                    entry.target.parentElement.classList.remove('open');
                    entry.target.nextElementSibling?.remove();
                }
            }
        }
    });
}