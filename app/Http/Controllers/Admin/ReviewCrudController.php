<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReviewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReviewCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/review');
        CRUD::setEntityNameStrings(trans('backpack::crud.review'), trans('backpack::crud.reviews'));
    }

    /**
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'name'  => 'id',
            'label' => '№',
        ]);
        CRUD::addColumn([
            'name' => 'active',
            'label' => trans('backpack::fields.active'),
            'type' => 'check',
        ]);
        CRUD::addColumn([
            'name' => 'sort',
            'label' => trans('backpack::fields.sort'),
        ]);
        CRUD::addColumn([
            'name' => 'user_name',
            'label' => trans('backpack::fields.user_name'),
        ]);
        CRUD::addColumn([
            'name' => 'rating',
            'label' => trans('backpack::fields.rating'),
        ]);

    }

    /**
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ReviewRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'rating', 'label' => trans('backpack::fields.rating'), 'type' => 'number', 'attributes' => ["max" => "5"], 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'date_created_review', 'label' => trans('backpack::fields.date_created_review'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'text', 'label' => trans('backpack::fields.text_review'), 'type' => 'text']);


        CRUD::addField(['name' => 'user_name', 'label' => trans('backpack::fields.user_name'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'user_icon', 'label' => trans('backpack::fields.user_icon'), 'disk' => 'public', 'type' => 'image', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
    }

    /**
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
