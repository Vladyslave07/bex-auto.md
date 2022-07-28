import Common from './import/common';
import Phone from './import/phone';
import Dropdown from './import/dropdown';
import ProductSwiper from './import/product-swiper';
import Modal from './import/modal';

Common();
Phone();
Dropdown();
ProductSwiper();
Modal();

document.addEventListener('livewire:load', function () {
        const getBound = document.querySelector('.section-catalog .tab-links .active').getBoundingClientRect();
        document.querySelector('.section-catalog .tab-links').scrollLeft = getBound.left - getBound.width/2 - 20;
});