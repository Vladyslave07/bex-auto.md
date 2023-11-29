<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PopupRequest;
use App\Models\Category;
use App\Models\Service;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\CloneOperation;

/**
 * Class PopupCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PopupCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Popup::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/popup');
        CRUD::setEntityNameStrings(trans('backpack::crud.popup'), trans('backpack::crud.popups'));
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
            'name' => 'categories',
            'label' => trans('backpack::fields.categories'),
            'type' => 'relationship',
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
        CRUD::setValidation(PopupRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'default' => '1', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['name' => 'main', 'label' => trans('backpack::fields.main_popup'), 'hint' => trans('backpack::hint.popups.main_popup'), 'type' => 'checkbox', 'default' => '0', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);

        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField([
            'name' => 'categories',
            'label' => trans('backpack::fields.categories'),
            'type' => 'relationship',
            'entity' => 'categories',
            'attribute' => 'title',
            'model' => Category::class,
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
        ]);

        CRUD::addField([
            'name' => 'services',
            'label' => trans('backpack::fields.services'),
            'type' => 'relationship',
            'entity' => 'services',
            'attribute' => 'title',
            'model' => Service::class,
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            'options' => (function ($query) {
                $services = $query->orderBy('title', 'asc')->get();
                return $services->map(function ($service) {
                    $service->title = strip_tags($service->title);
                    return $service;
                });
            }),
        ]);

        CRUD::addField(['name' => 'image', 'label' => trans('backpack::fields.image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'popups', 'thumb_prefix' => '', 'hint' => 'size 500x500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

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
