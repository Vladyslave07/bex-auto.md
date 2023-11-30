<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HeaderMenuRequest;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class HeaderMenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class HeaderMenuCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use BulkDeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\HeaderMenu::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/header-menu');
        CRUD::setEntityNameStrings(trans('backpack::crud.header_menu'), trans('backpack::crud.header_menus'));
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
                'name'  => 'active',
                'label' => trans('backpack::fields.active'),
                'type'  => 'check'
            ],
            [
                'name'  => 'title',
                'label' => trans('backpack::fields.name'),
            ],
            [
                'name'  => 'link',
                'label' => trans('backpack::fields.link'),
            ],
            [
                'name'  => 'sort',
                'label' => trans('backpack::fields.sort'),
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
        CRUD::setValidation(HeaderMenuRequest::class);

        CRUD::addField([
            'name'       => 'active',
            'label'      => trans('backpack::fields.active'),
            'type'       => 'checkbox',
            'default'    => '1',
            'wrapperAttributes' => ['class' => 'form-group col-md-8'],
        ]);

        CRUD::addField([
            'name'       => 'title',
            'label'      => trans('backpack::settings.name'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'slug',
            'label'      => trans('backpack::fields.symbol_code'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            'hint' => trans('backpack::hint.categories.slug'),
        ]);

        CRUD::addField([
            'name'       => 'sort',
            'label'      => trans('backpack::fields.sort'),
            'type'       => 'number',
            'default'    => '500',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'link',
            'label'      => trans('backpack::fields.link'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            'hint' => trans('backpack::hint.categories.slug'),
        ]);



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
