import Common from './import/common';
import Phone from './import/phone';
import Tabs from './import/tabs';
import Dropdown from './import/dropdown';
import ProductSwiper from './import/product-swiper';
import NewGallerySwiper from './import/new-gallery-swiper';
import Modal from './import/modal';
import { Fancybox } from "@fancyapps/ui";

Common();
Phone();
Tabs();
Dropdown();
ProductSwiper();
NewGallerySwiper();
Modal();

document.addEventListener('livewire:load', function () {
    document.querySelectorAll('.card-nav .item').forEach(btn => btn.addEventListener('click', () => {
        btn.closest('.card').id = btn.dataset.target;
        btn.closest('.card-nav').querySelector('.active').classList.remove('active');
        btn.classList.add('active');
    }));
});