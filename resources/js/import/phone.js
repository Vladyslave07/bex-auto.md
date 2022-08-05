import Inputmask from "inputmask";

export default function () {
    document.addEventListener('livewire:load', function () {
        Inputmask({
            mask: '+380 ( 999999999 )',
            showMaskOnHover: false,
            clearMaskOnLostFocus: true,

            // fix for livewire rerender component when empty value
            onBeforeMask: (value) => {
                if (null === value) {
                    value = '*'
                }
                return value;
            }
        }).mask(document.querySelectorAll('input[data-type="tel"]'))
    });

}