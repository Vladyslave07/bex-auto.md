<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SettingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SettingCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation {
        create as traitCreate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Setting::class);
        CRUD::setRoute(backpack_url('setting'));
        CRUD::setEntityNameStrings(trans('backpack::settings.setting_singular'), trans('backpack::settings.setting_plural'));
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
                'name'  => 'name',
                'label' => trans('backpack::fields.name'),
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
//        CRUD::setValidation(SettingRequest::class);

        CRUD::addField([
            'name'       => 'active',
            'label'      => trans('backpack::fields.active'),
            'type'       => 'checkbox',
        ]);

        CRUD::addField([
            'name'       => 'name',
            'label'      => trans('backpack::settings.name'),
            'type'       => 'text',
        ]);

        CRUD::addField([
            'name'       => 'key',
            'label'      => trans('backpack::fields.symbol_code'),
            'type'       => 'text',
        ]);

        CRUD::addField([
            'name'       => 'value',
            'label'      => trans('backpack::settings.value'),
            'type'       => 'text',
        ]);

        CRUD::addField([
            'name'       => 'field',
            'label'      => trans('backpack::fields.field_type'),
            'options'     => [
                '{"name":"value","label":"\u0417\u043d\u0430\u0447\u0435\u043d\u0438\u0435","type":"text"}' => 'Текст',
                '{"name":"value","label":"\u0418\u0437\u043e\u0431\u0440\u0430\u0436\u0435\u043d\u0438\u0435","type":"image"}' => 'Картинка'
            ],
            'allows_null' => false,
            'type'       => 'select_from_array',
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

    public function create() {
//        $request = $this->crud->getRequest()->request;
//        dd($request);

        $response = $this->traitCreate();
        // do something after save
        return $response;
    }
}
