<?php

namespace App\Http\Controllers\Admin;

use App\Http\Livewire\Forms\AutoForZsu;
use App\Http\Requests\FormResultRequest;
use App\Traits\FormFilterTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormResultCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormResultAutoForZsuCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use FormFilterTrait;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\FormResult::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/form-result/auto_for_zsu');
        CRUD::setEntityNameStrings(trans('backpack::crud.result'), trans('backpack::crud.results'));
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
        CRUD::addClause('where', 'slug_form', AutoForZsu::SLUG_FORM);

        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('phone');
        CRUD::column('created_at');
        CRUD::column('utm_source');
        CRUD::column('utm_medium');
        CRUD::column('utm_campaign');
        CRUD::column('utm_term');
        CRUD::column('utm_content');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {

        CRUD::setValidation(FormResultRequest::class);

        CRUD::addField([
            'name' => 'created_at',
            'label' => trans('backpack::fields.created_at'),
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name' => 'updated_at',
            'label' => trans('backpack::fields.updated_at'),
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name' => 'id',
            'label' => trans('backpack::fields.id'),
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name' => 'name',
            'label' => trans('backpack::fields.name'),
            'type' => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);
        CRUD::addField([
            'name' => 'phone',
            'label' => trans('backpack::fields.phone'),
            'type' => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'name' => 'utm_source',
            'label' => 'utm_source',
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField([
            'name' => 'utm_medium',
            'label' => 'utm_medium',
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField([
            'name' => 'utm_campaign',
            'label' => 'utm_campaign',
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField([
            'name' => 'utm_term',
            'label' => 'utm_term',
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-4']
        ]);
        CRUD::addField([
            'name' => 'utm_content',
            'label' => 'utm_content',
            'type' => 'text',
            'attributes' => [ 'readonly' => 'readonly', 'disabled' => 'disabled'],
            'wrapperAttributes' => ['class' => 'form-group col-md-4']
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
