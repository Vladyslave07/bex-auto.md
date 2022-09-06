<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\Faq;
use App\Models\SeoText;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings(trans('backpack::crud.news'), trans('backpack::crud.news_plural'));
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
            'name' => 'title',
            'label' => trans('backpack::fields.name'),
        ]);
        CRUD::addColumn([
            'name' => 'slug',
            'label' => trans('backpack::fields.slug'),
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
        CRUD::setValidation(NewsRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text']);
        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'simplemde']);


        CRUD::addField(['name' => 'preview_text', 'label' => trans('backpack::fields.preview_text'), 'type' => 'simplemde']);
        CRUD::addField(['name' => 'detail_text', 'label' => trans('backpack::fields.detail_text'), 'type' => 'simplemde']);

        CRUD::addField([
            'name' => 'image',
            'label' => trans('backpack::fields.image'),
            'disk' => 'public',
            'type' => 'image',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
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
        CRUD::addField([
            'name' => 'created_at',
            'label' => trans('backpack::fields.created_at'),
            'type' => 'datetime',
            'attributes' => [
                'disabled'    => 'disabled',
            ],
            'wrapperAttributes' => ['class' => 'form-group col-md-6', 'disabled' => true]
        ]);
        CRUD::addField([
            'name' => 'updated_at',
            'label' => trans('backpack::fields.updated_at'),
            'type' => 'datetime',
            'attributes' => [
                'disabled'    => 'disabled',
            ],
            'wrapperAttributes' => ['class' => 'form-group col-md-6', 'disabled' => true]
        ]);
        $this->setupCreateOperation();
    }
}
