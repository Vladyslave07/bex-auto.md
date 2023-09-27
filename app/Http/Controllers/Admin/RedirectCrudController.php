<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RedirectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RedirectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RedirectCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Redirect::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/redirect');
        CRUD::setEntityNameStrings(trans('backpack::crud.redirect'), trans('backpack::crud.redirects'));
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
                'name'  => 'url_from',
                'label' => trans('backpack::fields.url_from'),
            ],
            [
                'name'  => 'url_to',
                'label' => trans('backpack::fields.url_to'),
            ],
            [
                'name'  => 'type',
                'label' => trans('backpack::fields.type'),
            ],
            [
                'name'  => 'quantity',
                'label' => trans('backpack::fields.quantity'),
            ],
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
        CRUD::setValidation(RedirectRequest::class);

        CRUD::addField(['name' => 'url_from', 'label' => trans('backpack::fields.url_from'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'url_to', 'label' => trans('backpack::fields.url_to'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);


        CRUD::addField([
            'name' => 'type',
            'label' => trans('backpack::fields.type'),
            'type' => 'select_from_array',
            'options'     => ['301' => '301', '302' => '302'],
            'allows_null' => false,
            'default'     => '301',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField(['name' => 'quantity', 'label' => trans('backpack::fields.quantity'), 'type' => 'number', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::addField(['name' => 'created_at', 'label' => trans('backpack::fields.created_at'), 'disabled'  => 'disabled']);
        CRUD::addField(['name' => 'updated_at', 'label' => trans('backpack::fields.updated_at'), 'disabled'  => 'disabled']);
        $this->setupCreateOperation();
    }
}
