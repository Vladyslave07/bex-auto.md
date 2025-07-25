<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarModelRequest;
use App\Models\Brand;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarModelCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarModelCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\CarModel::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car-model');
        CRUD::setEntityNameStrings(trans('backpack::crud.car_model'), trans('backpack::crud.car_models'));
        CRUD::enableExportButtons();
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
        CRUD::setValidation(CarModelRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox']);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500']);
        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text']);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug'), 'attributes' => ['disabled' => 'disabled']]);

        CRUD::addField([
            'name' => 'brand_id',
            'label' => trans('backpack::fields.brand'),
            'type' => 'relationship',
            'entity'    => 'brand',
            'model'     => Brand::class,
            'attribute' => 'title',
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
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
