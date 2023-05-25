<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PropertyRequest;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PropertyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PropertyCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Property::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/property');
        CRUD::setEntityNameStrings(trans('backpack::crud.property'), trans('backpack::crud.properties'));
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
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereRaw('JSON_UNQUOTE(JSON_EXTRACT(title,"$.'.\App::getLocale().'")) like "%'.$searchTerm.'%"');
            }
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
        CRUD::setValidation(PropertyRequest::class);

        CRUD::addField([
            'name' => 'active',
            'label' => trans('backpack::fields.active'),
            'type' => 'checkbox',
            'default' => 1,
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'show',
            'label' => trans('backpack::fields.show'),
            'type' => 'checkbox',
            'default' => true,
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'show_product',
            'label' => trans('backpack::fields.show_product'),
            'type' => 'checkbox',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => trans('backpack::fields.image'),
            'type' => 'image',
            'disk' => 'public',
            'destination_path' => 'properties', 'thumb_prefix' => '',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'sort',
            'label' => trans('backpack::fields.sort'),
            'type' => 'number',
            'default' => 500,
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'for',
            'label' => trans('backpack::fields.for'),
            'type' => 'select_from_array',
            'options' => [
                'cars' => trans('backpack::fields.option_for.cars'),
                'products' => trans('backpack::fields.option_for.products')
            ],
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'title',
            'label' => trans('backpack::fields.name'),
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'slug',
            'label' => trans('backpack::fields.slug'),
            'type' => 'text',
            'hint' => trans('backpack::hint.properties.slug'),
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'field_type',
            'label' => trans('backpack::fields.field_type'),
            'type' => 'enum',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);
        CRUD::addField([
            'name' => 'filter_type',
            'label' => trans('backpack::fields.filter_type'),
            'type' => 'enum',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'step',
            'label' => trans('backpack::fields.step'),
            'type' => 'number',
            'attributes' => ["step" => "any"],
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'prefix',
            'label' => trans('backpack::fields.prefix'),
            'type' => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);

        CRUD::addField([
            'name' => 'options',
            'label' => trans('backpack::fields.options'),
            'type' => 'table',
            'entity_singular' => 'значение',
            'columns' => [
                'name'  => 'Наименование',
                'value'  => 'Значение',
            ],
        ]);

        // Todo: Реализовать выбор из моделей (т.е. позволять пользователю устанавливать сущность из селекта а не писать вручную)
        CRUD::addField([
            'name' => 'relation',
            'label' => trans('backpack::fields.relation'),
            'type' => 'text',
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
