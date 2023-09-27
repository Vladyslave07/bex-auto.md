<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BankRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BankCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BankCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Bank::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/bank');
        CRUD::setEntityNameStrings(trans('backpack::crud.bank'), trans('backpack::crud.banks'));
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
        CRUD::column('active');
        CRUD::column('sort');
        CRUD::column('title');
        CRUD::column('created_at');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(BankRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'default' => '1', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'image', 'label' => trans('backpack::fields.image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'banks', 'thumb_prefix' => '', 'hint' => 'size 60x60', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'btn_text', 'label' => trans('backpack::fields.btn_text'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'link_for_new_cars', 'label' => trans('backpack::fields.link_for_new_cars'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'link_for_old_cars', 'label' => trans('backpack::fields.link_for_old_cars'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);


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
