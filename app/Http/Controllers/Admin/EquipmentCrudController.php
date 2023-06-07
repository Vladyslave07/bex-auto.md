<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\EquipmentRequest;
use App\Traits\BulkDeleteOperation;
use App\Traits\DropzoneTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EquipmentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EquipmentCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
    use DropzoneTrait;
    use BulkDeleteOperation;


    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Equipment::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/equipment');
        CRUD::setEntityNameStrings(trans('backpack::crud.equipment'), trans('backpack::crud.equipments'));
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('price');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(EquipmentRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'default' => '1', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'target'  => 'title', 'type' => 'slug', 'hint' => trans('backpack::hint.categories.slug'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'price', 'label' => trans('backpack::fields.price'), 'hint' => trans('backpack::hint.equipments.price'), 'type' => 'number', 'attributes' => ["step" => "any"]]);
        CRUD::addField([
            'name' => 'color',
            'multiple' => true,
            'label' => trans('backpack::fields.color'),
            'type' => 'color_picker'
        ]);
        CRUD::addField([
            'name' => 'volumes',
            'label' => trans('backpack::fields.volumes'),
            'type' => 'repeatable',
            'subfields' => [
                [
                    'name'    => 'value',
                    'type'    => 'number',
                    'decimals' => 2,
                    'dec_point' => ',',
                    'attributes' => ["step" => "any"],
                    'label'   => trans('backpack::fields.volumes_value'),
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
                [
                    'name'  => 'unit',
                    'type'  => 'text',
                    'label' => trans('backpack::fields.prefix'),
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
                [
                    'name'  => 'price',
                    'type'  => 'number',
                    'label' => trans('backpack::fields.price'),
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
            ],
            'max_rows' => 8,
        ]);
        CRUD::addField([
            'name' => 'characteristic',
            'label' => trans('backpack::fields.characteristic'),
            'type' => 'repeatable',
            'subfields' => [
                [
                    'name'    => 'title',
                    'type'    => 'text',
                    'label'   => 'Заголовок блока характеристик',
                    'default'   => 'Характеристики',
                ],
                [
                    'name'  => 'text',
                    'type'  => 'ckeditor',
                    'label' => 'Текст',
                    'options' => [
                        'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                        'height' => 500
                    ]
                ],
            ],
            'max_rows' => 1,
            ]);

        CRUD::addField(['name' => 'images', 'label' => trans('backpack::fields.images'), 'type' => 'dropzone', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '',]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
