<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use App\Traits\DropzoneTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use DropzoneTrait;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings(trans('backpack::crud.car'), trans('backpack::crud.cars'));
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setColumns(
            [
                'name'  => 'id',
                'label' => '№',
            ],
            [
                'name'  => 'title',
                'label' => 'Заголовок',
            ],
            [
                'name'  => 'sort',
                'label' => 'Сортировка',
            ],
            [
                'name'  => 'status',
                'label' => 'Активность',
                'type'  => 'check'
            ],
            [
                'name'  => 'image',
                'label' => 'Изображение',
                'type' => 'image',
                'disk' => 'public',
                'height' => '50px',
                'width' => '50px',
            ]
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox']);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500']);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text']);
        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text']);
        CRUD::addField(['name' => 'images', 'label' => trans('backpack::fields.images'), 'type' => 'dropzone', 'disk' => 'public', 'destination_path' => 'products/', 'thumb_prefix' => '',]);
        CRUD::addField(['name' => 'description', 'label' => trans('backpack::fields.description'), 'type' => 'text']);
        CRUD::addField(['name' => 'price', 'label' => trans('backpack::fields.price'), 'type' => 'text']);
        CRUD::addField(['name' => 'info', 'label' => trans('backpack::fields.info'), 'type' => 'text', 'hint' => trans('backpack::hint.info')]);
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
