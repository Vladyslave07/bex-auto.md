{{-- configurable color picker --}}
{{-- https://farbelous.io/bootstrap-colorpicker/ --}}
@include('crud::fields.inc.wrapper_start')
<label>{!! $field['label'] !!}</label>
@include('crud::fields.inc.translatable_icon')
<input
    type="hidden"
    name="{{ $field['name'] }}"
    data-init-function="InitColorPickerElementButtonAdd"
    value="{{ old_empty_or_null($field['name'], '') ?? json_encode($field['value'] ?? []) ?? $field['default'] ?? '' }}"
>
<div class="color-picker-inputs-wrap">
    @if($field['value'] && count($field['value']) > 0)
        @foreach($field['value'] as $value)
            <div class="input-group colorpicker-component">
                <input
                    type="text"
                    bp-field-main-input
                    value="{{ $value }}"
                    data-init-function="bpFieldInitColorPickerElement"
                    @include('crud::fields.inc.attributes')
                >
                <span class="input-group-append">
                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                </span>
            </div>
        @endforeach
    @else
        <div class="input-group colorpicker-component">
            <input
                type="text"
                bp-field-main-input
                value=""
                data-init-function="bpFieldInitColorPickerElement"
                @include('crud::fields.inc.attributes')
            >
            <span class="input-group-append">
                <span class="input-group-text colorpicker-input-addon"><i></i></span>
            </span>
        </div>
    @endif
</div>
<button type="button" class="btn btn-outline-primary btn-sm ml-1 add-color-picker-element-button">
    + {{ $field['new_item_label'] ?? trans('backpack::crud.new_item') }}</button>

{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif
@include('crud::fields.inc.wrapper_end')

{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}

{{-- FIELD CSS - will be loaded in the after_styles section --}}
@push('crud_fields_styles')
    @loadOnce('packages/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')
    @loadOnce('bpFieldInitColorPickerElement-custom-style')
    <style>
        .input-group > .input-group-append > .input-group-text {
            border: 1px solid rgba(0, 40, 100, .12);
        }

        .input-group > .input-group-append > .input-group-text:focus {
            outline: 0;
            border-color: #9080f1;
            box-shadow: 0 0 0 2px #e1dcfb;
        }
    </style>
    @endLoadOnce
@endpush

{{-- FIELD JS - will be loaded in the after_scripts section --}}
@push('crud_fields_scripts')
    @loadOnce('packages/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')
    @loadOnce('bpFieldInitColorPickerElement')
    <script>
        function bpFieldInitColorPickerElement(element) {
            // https://itsjavi.com/bootstrap-colorpicker/
            var config = jQuery.extend({}, {!! isset($field['color_picker_options']) ? json_encode($field['color_picker_options']) : '{}' !!});
            var picker = element.parents('.colorpicker-component').colorpicker(config);

            element.on('focus', function () {
                picker.colorpicker('show');
            });

            // Set value from all color-picker inputs
            initSetValue(element);
        }

        function initSetValue (element) {
            element.parent().find('input[type=text]').change(function (input) {
                let value = [];
                element.closest('.form-group')[0].querySelectorAll('input[type=text]').forEach(otherInput => {
                    value.push(otherInput.value);
                });
                element.closest('.form-group')[0].querySelector('input[type=hidden]').value = JSON.stringify(value);
            });
        }
    </script>
    @endLoadOnce

    @loadOnce('InitColorPickerElementButtonAdd')
    <script>
        function InitColorPickerElementButtonAdd(element) {
            element.closest('.form-group').find('.add-color-picker-element-button').click(function () {
                newColorPickerElement(element);
            });
        }

        function newColorPickerElement(element) {
            let newElement = `<div class="input-group colorpicker-component">
                    <input
                        type="text"
                        value=""
                        class="form-control"
                    >
                    <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                    </span>
                </div>`;

            element.parent()[0].querySelector('.color-picker-inputs-wrap').insertAdjacentHTML('beforeend', newElement);

            initSetValue(element);

            let config = jQuery.extend({}, {!! isset($field['color_picker_options']) ? json_encode($field['color_picker_options']) : '{}' !!});
            let picker = element.parent().find('.colorpicker-component').colorpicker(config);

            element.on('focus', function () {
                picker.colorpicker('show');
            });
        }
    </script>
    @endLoadOnce
@endpush

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
