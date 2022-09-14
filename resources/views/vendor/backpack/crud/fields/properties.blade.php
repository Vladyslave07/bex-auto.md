{{-- PROPERTIES FIELD TYPE --}}
@php

    if (isset($field['value']) && count($field['value']) > 0) {
        $values = [];
        foreach ($field['value'] as $value) {
            $values[] = ['properties' => $value->id, 'value' => $value->pivot->value];
        }
        $field['value'] = json_encode($values);
    }
@endphp
@php
    $field['value'] = old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' ));
    // make sure the value is a JSON string (not array, if it's cast in the model)
    $field['value'] = is_array($field['value']) ? json_encode($field['value']) : $field['value'];
@endphp

@include('crud::fields.inc.wrapper_start')

<label>{!! $field['label'] !!}</label>
@include('crud::fields.inc.translatable_icon')
<input
    type="hidden"
    name="{{ $field['name'] }}"
    data-init-function="bpFieldInitPropertiesElement"
    value="{{ $field['value'] }}"
    @include('crud::fields.inc.attributes')
>

{{-- HINT --}}
@if (isset($field['hint']))
  <p class="help-block text-muted text-sm">{!! $field['hint'] !!}</p>
@endif

<div class="col-md-12 row m-2 container-properties-elements" data-properties-holder="{{ $field['name'] }}">
    @if (isset($field['fields']) && is_array($field['fields']) && count($field['fields']))
        @foreach($field['fields'] as $id => $subfield)
            <div class="container-properties-element col-md-12">
                <input type="hidden" value="{{ $id }}" name="properties">
                @php

                    $subfield = $crud->makeSureFieldHasNecessaryAttributes($subfield);

                    $fieldViewNamespace = $subfield['view_namespace'] ?? 'crud::fields';
                    $fieldViewPath = $fieldViewNamespace.'.'.$subfield['type'];
                    $subfield['showAsterisk'] = false;
                @endphp

                @include($fieldViewPath, ['field' => $subfield])
            </div>
        @endforeach
    @endif
</div>

@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        <script>
        /**
         * Takes all inputs and makes them an object.
         */
        function propertiesInputToObj(container_name) {
            let arr = [];
            let obj = {};

            let container = $('[data-properties-holder=' + container_name + ']');
            container.find('.container-properties-element').each(function () {
                $(this).find('input, select, textarea').each(function () {
                    if ($(this).data('properties-input-name')) {
                        obj[$(this).data('properties-input-name')] = $(this).val();
                    }
                });

                arr.push(obj);
                obj = {};
            });

            return arr;
        }

        /**
         * The method that initializes the javascript on this field type.
         */
        function bpFieldInitPropertiesElement(element) {
            let field_name = element.attr('name');

            // element will be a jQuery wrapped DOM node
            let container = $('[data-properties-holder=' + field_name + ']');

            // make sure the inputs no longer have a "name" attribute,
            // so that the form will not send the inputs as request variables;
            // use a "data-properties-input-name" attribute to store the same information;
            container.find('input, select, textarea')
                .each(function () {
                    let name_attr = '';
                    if ($(this).data('name')) {
                        name_attr = $(this).data('name');
                        $(this).removeAttr("data-name");
                    } else if ($(this).attr('name')) {
                        name_attr = $(this).attr('name');
                        $(this).removeAttr("name");
                    }
                    $(this).attr('data-properties-input-name', name_attr);
                });

            if (element.val()) {
                let values = {};
                JSON.parse(element.val()).forEach((value) => {
                    // todo: Свойсто undefined value[field_name]
                    if (values.hasOwnProperty(value[field_name])) {
                        values[value[field_name]] = [value.value].concat([values[value[field_name]]]);
                    } else {
                        values[value[field_name]] = value.value;
                    }
                });

                for (const key in values) {
                    if (Object.hasOwnProperty.call(values, key)) {
                        const value = values[key];
                        let $propertiesField = $('[data-properties-input-name=' + field_name + '][value=' + key + ']');
                        if ($propertiesField) {
                            let $valueField = $propertiesField.parent().find('[data-properties-input-name=value]');
                            if ($valueField) {
                                if (Array.isArray(value)) {
                                    $valueField.val(JSON.stringify(value.map((v) => { return {value: v}; })));
                                } else {
                                    $valueField.val(value);
                                }

                                if ($valueField.is('select') && $valueField.children('option').length === 0) {
                                    $valueField.attr('data-selected-options', JSON.stringify(value));
                                }
                            }
                        }
                    }
                }
            }

            if (element.closest('.modal-content').length) {
                element.closest('.modal-content').find('.save-block').click(function(){
                    element.val(JSON.stringify(propertiesInputToObj(field_name)));
                })
            } else if (element.closest('form').length) {
                element.closest('form').submit(function(){
                    element.val(JSON.stringify(propertiesInputToObj(field_name)));
                    return true;
                })
            }
            }
        </script>
    @endpush
@endif
