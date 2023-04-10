<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FooterMenuRequest;
use App\Models\Domain;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FooterMenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FooterMenuCrudController extends CrudController
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
        CRUD::setModel(\App\Models\FooterMenu::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/footer_menus');
        CRUD::setEntityNameStrings('footer menu', 'footer menus');
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
        CRUD::column('title');
        CRUD::column('sort');
        CRUD::column('column');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(FooterMenuRequest::class);

        CRUD::addField([
            'name'       => 'active',
            'label'      => trans('backpack::fields.active'),
            'type'       => 'checkbox',
            'default'       => '1',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'title',
            'label'      => trans('backpack::settings.name'),
            'type'       => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'slug',
            'label'      => trans('backpack::fields.link'),
            'type'       => 'text',
            'hint'       => 'Без домена и языковой версии ex: /avto/avto-iz-korei',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'sort',
            'label'      => trans('backpack::fields.sort'),
            'type'       => 'number',
            'default'    => '500',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'sort',
            'label'      => trans('backpack::fields.sort'),
            'type'       => 'number',
            'default'    => '500',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'column',
            'label'      => trans('backpack::fields.column'),
            'type'       => 'select_from_array',
            'default'    => '1',
            'options' => trans('backpack::fields.footer_menu_option'),
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'domains',
            'label' => trans('backpack::fields.menu_domains'),
            'type' => 'relationship',
            'entity' => 'domains',
            'attribute' => 'title',
            'model' => Domain::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
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
