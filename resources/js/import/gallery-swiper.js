import {Swiper} from './swiper';

export default function() {
    const galleryDwiper =  new Swiper('.gallery-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            clickable: true,
        },
        on: {
            slideChange: function(e) {
                const video = e.slides[e.activeIndex].querySelector('iframe');

                if(video?.dataset.src) {
                    video.src = video.dataset.src;
                    video.removeAttribute('data-src');
                }
            },
        }
    });

    document.addEventListener('livewire:load', function () {
        document.querySelectorAll('.gallery-thumbs .item').forEach((btn, i) => btn.addEventListener('click', () => {
            btn.closest('.gallery-thumbs').querySelector('.active').classList.remove('active');
            btn.classList.add('active');
            galleryDwiper.slideTo(i);
        }));
    });
}