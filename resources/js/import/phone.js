import Inputmask from "inputmask";

export default function () {
    document.addEventListener('livewire:load', function () {
        let mask = document.querySelector('meta[name=phone_mask]').getAttribute('content')

        Inputmask({
            mask: mask,
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