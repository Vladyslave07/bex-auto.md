<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use App\Models\Category;
use App\Traits\DropzoneTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use DropzoneTrait;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings(trans('backpack::crud.car'), trans('backpack::crud.cars'));
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setColumns([
            [
                'name'  => 'id',
                'label' => '№',
            ],
            [
                'name'  => 'title',
                'label' => trans('backpack::fields.title'),
            ],
            [
                'name'  => 'sort',
                'label' => trans('backpack::fields.sort'),
            ],
            [
                'name'  => 'active',
                'label' => trans('backpack::fields.active'),
                'type'  => 'check'
            ],
            [
                'name'  => 'image',
                'label' => trans('backpack::fields.image'),
                'type' => 'image',
                'disk' => 'public',
                'height' => '50px',
                'width' => '50px',
            ]
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'pin', 'label' => trans('backpack::fields.pin'), 'type' => 'checkbox']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'images', 'label' => trans('backpack::fields.images'), 'type' => 'dropzone', 'disk' => 'public', 'destination_path' => 'products/', 'thumb_prefix' => '',]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'description', 'label' => trans('backpack::fields.description'), 'type' => 'text']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'price', 'label' => trans('backpack::fields.price'), 'type' => 'text']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'info', 'label' => trans('backpack::fields.info'), 'type' => 'text', 'hint' => trans('backpack::hint.info')]);

        CRUD::addField([
            'name' => 'categories',
            'label' => trans('backpack::fields.categories'),
            'type' => 'relationship',
            'entity' => 'categories',
            'attribute' => 'title',
            'model' => Category::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
            'tab' => 'Свойства'
        ]);

        CRUD::addField([
            'name'        => 'status',
            'label'       => trans('backpack::fields.status'),
            'type'        => 'select_from_array',
            'options'     => ['in_stock' => trans('backpack::fields.option.in_stock'), 'expect' => trans('backpack::fields.option.expect'), 'on_order' => trans('backpack::fields.option.on_order')],
            'allows_null' => false,
            'default'     => 'in_stock',
            'tab' => 'Свойства'
        ]);

        CRUD::addField([
            'name'        => 'year',
            'label'       => trans('backpack::fields.year'),
            'type'        => 'number',
            'tab' => 'Свойства'
        ]);

        $propertiesFields = [];

        if ($this->crud->getCurrentEntry()) {
            foreach ($this->crud->getCurrentEntry()->getCategoryProperties() as $property) {
                $valueField = [];

                switch ($property->field_type) {
                    case 'relation':
                        $valueField = [
                            'type' => 'select_from_array',
                            'options' => $property->getRelationOption($property->relation),
                        ];
                        break;
                }

                $propertiesFields[$property->id] = array_merge([
                    'label' => $property->title,
                    'name' => 'value',
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ], $valueField);
            }
        }

        $this->crud->addField([
            'tab' => 'Свойства',
            'label' => 'Свойства',
            'type' => 'properties',
            'name' => 'properties', //the name of the BelongsToMany relation
            'entity' => 'properties',
            'pivot' => true,
            'fields' => $propertiesFields,
        ]);
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
