<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use App\Models\Domain;
use App\Models\Faq;
use App\Models\Menu;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class MenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MenuCrudController extends CrudController
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
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Menu::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/menu');
        CRUD::setEntityNameStrings('меню', 'меню');
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
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MenuRequest::class);

        CRUD::addField([
            'name'       => 'active',
            'label'      => trans('backpack::fields.active'),
            'type'       => 'checkbox',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name'       => 'show_link',
            'label'      => trans('backpack::fields.show_link'),
            'type'       => 'checkbox',
            'default'    => '1',
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
            'label'      => trans('backpack::fields.symbol_code'),
            'type'       => 'text',
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
            'name'       => 'image',
            'label'      => trans('backpack::fields.image'),
            'type'       => 'image',
            'disk' => 'public',
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

        CRUD::addField([
            'name' => 'items',
            'label' => trans('backpack::fields.menu_items'),
            'type' => 'table',
            'entity_singular' => trans('backpack::fields.menu_item'),
            'columns' => [
                'name'  => trans('backpack::fields.title'),
                'url'  => trans('backpack::fields.link'),
                'domain'  => trans('backpack::fields.domain') . ' (id домена через двоеточие)',
            ],
            'min' => 0,
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

    public function update() {

        $response = $this->traitUpdate();
        // do something after update

        Cache::forget(Menu::FOOTER_MENU_CACHE_KEY);
        Cache::forget(Menu::MAIN_MENU_CACHE_KEY);

        return $response;
    }

    public function create() {
        $response = $this->traitCreate();

        // do something after save

        Cache::forget(Menu::FOOTER_MENU_CACHE_KEY);
        Cache::forget(Menu::MAIN_MENU_CACHE_KEY);

        return $response;
    }

    public function destroy($id) {
        $response = $this->traitDestroy($id);

        // do something after save

        Cache::forget(Menu::FOOTER_MENU_CACHE_KEY);
        Cache::forget(Menu::MAIN_MENU_CACHE_KEY);

        return $response;
    }
}
