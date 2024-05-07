<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PricePrefixRequest;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\CloneOperation;

/**
 * Class PricePrefixCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PricePrefixCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
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
        CRUD::setModel(\App\Models\PricePrefix::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/price-prefix');
        CRUD::setEntityNameStrings(trans('backpack::crud.price_prefix'), trans('backpack::crud.price_prefixes'));
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
            'label' => trans('backpack::fields.price_prefix'),
        ]);
        CRUD::addColumn([
            'name' => 'sort',
            'label' => trans('backpack::fields.sort'),
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
        CRUD::setValidation(PricePrefixRequest::class);


        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'default' => '1', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);

        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

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
