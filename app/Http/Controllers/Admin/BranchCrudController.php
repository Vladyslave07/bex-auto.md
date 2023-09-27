<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Traits\BulkDeleteOperation;
use App\Traits\DropzoneTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class BranchCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BranchCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        create as traitCreate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use DropzoneTrait;
    use BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Branch::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/branch');
        CRUD::setEntityNameStrings(trans('backpack::crud.branch'), trans('backpack::crud.branches'));
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
        CRUD::column('id');
        CRUD::column('active');
        CRUD::column('city');
        CRUD::column('address');
        CRUD::column('sort');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(BranchRequest::class);

        CRUD::addField([
            'name'       => 'active',
            'label'      => trans('backpack::fields.active'),
            'type'       => 'checkbox',
        ]);

        CRUD::addField([
            'name'       => 'sort',
            'label'      => trans('backpack::fields.sort'),
            'type'       => 'number',
            'default'       => '500',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'city',
            'label'      => trans('backpack::fields.city'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'address',
            'label'      => trans('backpack::fields.address'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'phone',
            'label'      => trans('backpack::fields.phone'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'lat',
            'label'      => trans('backpack::fields.lat'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'lng',
            'label'      => trans('backpack::fields.lng'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'weekdays',
            'label'      => trans('backpack::fields.weekdays'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name'       => 'weekends',
            'label'      => trans('backpack::fields.weekends'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name' => 'images',
            'label' => trans('backpack::fields.images'),
            'type' => 'dropzone',
            'disk' => 'public',
            'destination_path' => 'products',
            'thumb_prefix' => ''
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

    public function update() {

        $response = $this->traitUpdate();
        // do something after update

        // Clear news list cache
        Cache::forget(Branch::BRANCHES_ITEMS_CACHE_KEY);

        return $response;
    }

    public function create() {
        $response = $this->traitCreate();

        // do something after save

        Cache::forget(Branch::BRANCHES_ITEMS_CACHE_KEY);

        return $response;
    }

    public function destroy($id) {
        $response = $this->traitDestroy($id);

        // do something after save

        Cache::forget(Branch::BRANCHES_ITEMS_CACHE_KEY);

        return $response;
    }
}
