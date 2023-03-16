<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DomainRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DomainCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DomainCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Domain::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/domain');
        CRUD::setEntityNameStrings(trans('backpack::crud.domain'), trans('backpack::crud.domains'));
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
                'name'  => 'slug',
                'label' => trans('backpack::fields.slug'),
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
        CRUD::setValidation(DomainRequest::class);

        CRUD::addField(['name' => 'created_at', 'label' => trans('backpack::fields.created_at'), 'type' => 'datetime', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled'    => 'disabled']]);
        CRUD::addField(['name' => 'updated_at', 'label' => trans('backpack::fields.updated_at'), 'type' => 'datetime', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled'    => 'disabled']]);


        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'country', 'label' => trans('backpack::fields.country'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.domains.country')]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'reviews_id', 'label' => trans('backpack::fields.reviews_id'), 'type' => 'text', 'hint' => trans('backpack::hint.domains.reviews_id')]);
        CRUD::addField(['name' => 'phone_mask', 'label' => trans('backpack::fields.phone_mask'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.domains.phone_mask')]);
        CRUD::addField(['name' => 'placeholder', 'label' => trans('backpack::fields.placeholder'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.domains.placeholder')]);
        CRUD::addField(['name' => 'phone', 'label' => trans('backpack::fields.phone'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'lat', 'label' => trans('backpack::fields.lat'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.domains.lat')]);
        CRUD::addField(['name' => 'lng', 'label' => trans('backpack::fields.lng'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.domains.lng')]);
        CRUD::addField(['name' => 'gtm', 'label' => trans('backpack::fields.gtm'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.domains.gtm')]);

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
