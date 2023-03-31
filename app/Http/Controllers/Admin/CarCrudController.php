<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Category;
use App\Models\Domain;
use App\Traits\BulkDeleteOperation;
use App\Traits\DropzoneTrait;
use App\Traits\FormFilterTrait;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
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
    use DropzoneTrait;
    use BulkDeleteOperation;
    use FormFilterTrait;

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

        $this->addDomainFilter();
        $this->addCategoriesFilter();

        CRUD::setColumns([
            [
                'name' => 'id',
                'label' => '№',
            ],
            [
                'name' => 'active',
                'label' => trans('backpack::fields.active'),
                'type' => 'check'
            ],
            [
                'name' => 'title',
                'label' => trans('backpack::fields.title'),
            ],
            [
                'name' => 'preview_image',
                'label' => trans('backpack::fields.preview_image'),
                'type' => 'image',
                'prefix' => 'storage/',
            ],
            [
                'name' => 'categories',
                'label' => trans('backpack::fields.categories'),
                'type' => 'relationship',
            ]
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
        CRUD::setValidation(CarRequest::class);

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'pin', 'label' => trans('backpack::fields.pin'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'show_credit_btn', 'label' => trans('backpack::fields.show_credit_btn'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField([
            'name' => 'domain',
            'label' => trans('backpack::fields.domain'),
            'type' => 'relationship',
            'entity' => 'domain',
            'attribute' => 'title',
            'model' => Domain::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
            'tab' => 'Автомобиль',
            'default' => Domain::DEFAULT_DOMAIN,
            'hint' => trans('backpack::hint.domains.car'),
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'created_at', 'label' => trans('backpack::fields.created_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'updated_at', 'label' => trans('backpack::fields.updated_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug')]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'vin', 'label' => trans('backpack::fields.vin'), 'type' => 'text']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'description', 'label' => trans('backpack::fields.description'), 'type' => 'tinymce']);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'price', 'label' => trans('backpack::fields.price'), 'type' => 'number', 'attributes' => ["step" => "any"]]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'info', 'label' => trans('backpack::fields.info'), 'type' => 'text', 'hint' => trans('backpack::hint.info')]);

//        CRUD::addField([
//            'name' => 'links',
//            'label' => trans('backpack::fields.links'),
//            'type' => 'relationship',
//            'entity' => 'links',
//            'attribute' => 'title',
//            'model' => Category::class,
//            'options' => (function ($query) {
//                return $query->orderBy('title', 'asc')->get();
//            }),
//            'tab' => 'Автомобиль',
//            'hint' => trans('backpack::hint.cars.links')
//        ]);

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'youtube_link', 'label' => trans('backpack::fields.youtube_link'), 'type' => 'text', 'hint' => trans('backpack::hint.cars.youtube_link')]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'preview_image', 'label' => trans('backpack::fields.preview_image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '', 'hint' => trans('backpack::hint.cars.preview_image')]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'images', 'label' => trans('backpack::fields.images'), 'type' => 'dropzone', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '',]);

        CRUD::addField([
            'name' => 'categories',
            'label' => trans('backpack::fields.categories'),
            'type' => 'relationship',
            'entity' => 'categories',
            'attribute' => 'title',
            'model' => Category::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
            'tab' => 'Свойства'
        ]);

        CRUD::addField([
            'name' => 'status',
            'label' => trans('backpack::fields.status'),
            'type' => 'select_from_array',
            'options' => [
                'in_stock' => trans('backpack::fields.option.in_stock'),
                'expect' => trans('backpack::fields.option.expect'),
                'on_order' => trans('backpack::fields.option.on_order'),
                'on_order_usa' => trans('backpack::fields.option.on_order_usa'),
                'on_order_korea' => trans('backpack::fields.option.on_order_korea'),
                'sold' => trans('backpack::fields.option.sold'),
            ],
            'allows_null' => false,
            'default' => 'in_stock',
            'tab' => 'Свойства'
        ]);

        $propertiesFields = [];
        if ($this->crud->getModel()) {
            foreach ($this->crud->getModel()->getCategoryProperties() as $property) {
                $valueField = [];

                switch ($property->field_type) {
                    case 'relation':
                        $valueField = [
                            'type' => 'select_from_array',
                            'name' => 'slug',
                            'options' => $property->getRelationOption($property->relation),
                        ];
                        break;
                    case 'text':
                        $valueField = [
                            'type' => $property->field_type,
                            'name' => 'value',
                        ];
                        break;
                    case 'number':
                        $valueField = [
                            'type' => $property->field_type,
                            'name' => 'value',
                            'attributes' => ["step" => "any"],
                        ];
                        break;
                    default:
                        $valueField = [
                            'type' => 'select_from_array',
                            'name' => 'value',
                            'options' => $property->getOptions(),
                        ];
                        break;
                }

                $propertiesFields[$property->id] = array_merge([
                    'label' => $property->title,
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ], $valueField);
            }
        }

        $this->crud->addField([
            'tab' => 'Свойства',
            'label' => 'Свойства',
            'type' => 'properties',
            'name' => 'properties', //the name of the BelongsToMany relation
            'entity' => 'properties',
            'pivot' => true,
            'fields' => $propertiesFields,
        ]);


        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'meta_title',
            'label' => trans('backpack::fields.meta_title'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code> <code>#price#</code> <code>#year#</code>',
        ]);

        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'meta_description',
            'label' => trans('backpack::fields.meta_description'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code> <code>#price#</code> <code>#year#</code>',
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

    public function update()
    {
        $response = $this->traitUpdate();
        // do something after update

        // Clear car cache
        Cache::forget(Car::POPULAR_CARS_CACHE_KEY);
        Cache::forget(Car::EXPECTED_CARS_CACHE_KEY);
        Cache::forget(Car::CARS_IN_STOCK_CATEGORY);

        return $response;
    }

    public function create()
    {
        $response = $this->traitCreate();

        // do something after save

        Cache::forget(Car::POPULAR_CARS_CACHE_KEY);
        Cache::forget(Car::EXPECTED_CARS_CACHE_KEY);
        Cache::forget(Car::CARS_IN_STOCK_CATEGORY);

        return $response;
    }

    public function destroy($id)
    {
        $response = $this->traitDestroy($id);

        // do something after save

        Cache::forget(Car::POPULAR_CARS_CACHE_KEY);
        Cache::forget(Car::EXPECTED_CARS_CACHE_KEY);
        Cache::forget(Car::CARS_IN_STOCK_CATEGORY);

        return $response;
    }
}
