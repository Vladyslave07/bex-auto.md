import Common from './import/common';
import Phone from './import/phone';
import Dropdown from './import/dropdown';
import ProductSwiper from './import/product-swiper';
import GallerySwiper from './import/gallery-swiper';
import Modal from './import/modal';

Common();
Phone();
Dropdown();
ProductSwiper();
GallerySwiper();
Modal();

document.addEventListener('livewire:load', function () {
    document.querySelectorAll('.card-nav .item').forEach(btn => btn.addEventListener('click', () => {
        btn.closest('.card').id = btn.dataset.target;
        btn.closest('.card-nav').querySelector('.active').classList.remove('active');
        btn.classList.add('active');
    }));
});