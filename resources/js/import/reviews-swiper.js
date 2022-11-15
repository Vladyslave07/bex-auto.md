import {Swiper} from './swiper';

export default function() {
    const reviewsArr = [];

    if(window.innerWidth > 767) {
        fetch('/reviews-list', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then((response) => response.json())
            .then((data) => {
                data.data.forEach((el) => {
                    const d = new Date(el.published_at * 1000);
                    let stars = '';

                    for (let i = 1; i <= 5; i++) {
                        if (i <= el.rating) {
                            stars += `<svg class="active" width="22" height="19"><use xlink:href="#star-icon"></use></svg>`;
                        } else {
                            stars += `<svg width="22" height="19"><use xlink:href="#star-icon"></use></svg>`;
                        }
                    }
                    reviewsArr.push(`<div class="swiper-slide"><div class="header"><img class="review-avatar" width="54" height="56" src="${el.user_icon}" loading="lazy" alt=""><div><a href="#" class="review-author" target="_blank">${el.user_name}</a><div class="review-rating"><div class="stars">${stars}</div><time class="review-data">${el.date_created_review}</time></div></div></div><div class="review-text"><p>${el.text}</p></div><div class="review-logo"><a href="#" class="review-logo" target="_blank"><svg width="34" height="34" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><path fill="#2A84FC" d="M21.579 12.234c0-.677-.055-1.358-.172-2.025h-9.403v3.839h5.384a4.615 4.615 0 01-1.992 3.029v2.49h3.212c1.886-1.736 2.97-4.3 2.97-7.333z" stroke="none"></path><path fill="#00AC47" d="M12.004 21.974c2.688 0 4.956-.882 6.608-2.406l-3.213-2.491c-.893.608-2.047.952-3.392.952-2.6 0-4.806-1.754-5.597-4.113H3.095v2.567a9.97 9.97 0 008.909 5.491z" stroke="none"></path><path fill="#FFBA00" d="M6.407 13.916a5.971 5.971 0 010-3.817V7.53H3.095a9.977 9.977 0 000 8.952l3.312-2.567z" stroke="none"></path><path fill="#FC2C25" d="M12.004 5.982a5.417 5.417 0 013.824 1.494l2.846-2.846a9.581 9.581 0 00-6.67-2.593A9.967 9.967 0 003.095 7.53l3.312 2.57c.787-2.363 2.996-4.117 5.597-4.117z" stroke="none"></path></svg><div><span class="label">Posted on</span><div class="name">Google</div></div></a></div></div>`);
                });
                SwiperInit();
            })
            .catch((error) => {
                console.error('Error:', error);
            });

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