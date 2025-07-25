<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PopularRequestRequest;
use App\Models\Menu;
use App\Models\PopularRequest;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class PopularRequestCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PopularRequestCrudController extends CrudController
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
    use BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\PopularRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/popular-request');
        CRUD::setEntityNameStrings(trans('backpack::crud.popular_request'), trans('backpack::crud.popular_requests'));
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
        CRUD::setValidation(PopularRequestRequest::class);


        CRUD::addField([ 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox']);
        CRUD::addField([ 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500']);
        CRUD::addField([ 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text']);
        CRUD::addField([ 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text']);
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

        Cache::forget(PopularRequest::POPULAR_REQUEST_CACHE_KEY);

        return $response;
    }

    public function create() {
        $response = $this->traitCreate();

        // do something after save

        Cache::forget(PopularRequest::POPULAR_REQUEST_CACHE_KEY);

        return $response;
    }

    public function destroy($id) {
        $response = $this->traitDestroy($id);

        // do something after save

        Cache::forget(PopularRequest::POPULAR_REQUEST_CACHE_KEY);

        return $response;
    }
}
