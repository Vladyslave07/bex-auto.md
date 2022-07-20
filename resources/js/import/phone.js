import Inputmask from "inputmask";

export default function() {
    document.addEventListener('livewire:load', function() {
        Inputmask({
            mask: '+380 ( 99999999 )',
            showMaskOnHover: false,
            clearMaskOnLostFocus: true
        }).mask(document.querySelectorAll('input[data-type="tel"]'))
    })
}