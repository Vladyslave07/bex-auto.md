<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BtnTextRequest;
use App\Models\Car;
use App\Models\Category;
use App\Models\Service;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\CloneOperation;

/**
 * Class BtnTextCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BtnTextCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use ShowOperation;
    use BulkDeleteOperation;
    use CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\BtnText::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/btn-text');
        CRUD::setEntityNameStrings(trans('backpack::crud.btn_text'), trans('backpack::crud.btn_texts'));
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name' => 'id',
            'label' => '№',
        ]);
        CRUD::addColumn([
            'name' => 'active',
            'label' => trans('backpack::fields.active'),
            'type' => 'check',
        ]);
        CRUD::addColumn([
            'name' => 'title',
            'label' => trans('backpack::fields.title'),
        ]);
        CRUD::addColumn([
            'name' => 'btn_text',
            'label' => trans('backpack::fields.btn_text'),
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
        CRUD::setValidation(BtnTextRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'default' => '1', 'wrapperAttributes' => ['class' => 'form-group col-md-2']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-2']]);

        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);

        CRUD::addField(['name' => 'btn_text', 'label' => trans('backpack::fields.btn_text'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField([
            'name'        => 'car_status',
            'label'       => trans('backpack::fields.car_status'),
            'type'        => 'select_from_array',
            'options' => [
                'in_stock' => trans('backpack::fields.option.in_stock'),
                'expect' => trans('backpack::fields.option.expect'),
                'on_order' => trans('backpack::fields.option.on_order'),
                'on_order_usa' => trans('backpack::fields.option.on_order_usa'),
                'on_order_korea' => trans('backpack::fields.option.on_order_korea'),
                'sold' => trans('backpack::fields.option.sold'),
            ],
        ]);

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
        ]);

        CRUD::addField([
            'name' => 'cars',
            'label' => trans('backpack::fields.option_for.cars'),
            'type' => 'relationship',
            'entity' => 'cars',
            'attribute' => 'title',
            'model' => Car::class,
            'options' => (function ($query) {
                $cars = $query->orderBy('title', 'asc')->get();
                return $cars->map(function ($car) {
                    $car->title = sprintf('%s, ID: %s', $car->title, $car->id);
                    return $car;
                });
            }),
        ]);

        CRUD::addField(['name' => 'created_at', 'label' => trans('backpack::fields.created_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField(['name' => 'updated_at', 'label' => trans('backpack::fields.updated_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
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
