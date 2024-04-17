<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Product;
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
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

    public static $imageSize = ['width' => 890, 'height' => 670];

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
        CRUD::enableExportButtons();
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        $this->addCategoriesFilter();
        $this->addBrandsFilter();
        $this->addModelsFilter();

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
                'name' => 'slug',
                'label' => trans('backpack::fields.slug'),
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

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'commission_car', 'label' => trans('backpack::fields.commission_car'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'show_credit_btn', 'label' => trans('backpack::fields.show_credit_btn'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-4']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'pin', 'label' => trans('backpack::fields.pin'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'status_sort', 'label' => trans('backpack::fields.status_sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'created_at', 'label' => trans('backpack::fields.created_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'updated_at', 'label' => trans('backpack::fields.updated_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'vin', 'label' => trans('backpack::fields.vin'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'slug', 'target' => 'title', 'hint' => trans('backpack::hint.categories.slug'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'price', 'label' => trans('backpack::fields.price'), 'type' => 'number', 'attributes' => ["step" => "any"], 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'info', 'label' => trans('backpack::fields.info'), 'type' => 'text', 'hint' => trans('backpack::hint.info'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'show_price_from', 'label' => trans('backpack::fields.show_price_from'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);


        CRUD::addField([
            'name' => 'products',
            'label' => trans('backpack::fields.products'),
            'type' => 'relationship',
            'entity' => 'products',
            'attribute' => 'title',
            'model' => Product::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
            'tab' => 'Автомобиль',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'youtube_link', 'label' => trans('backpack::fields.youtube_link'), 'type' => 'text', 'hint' => trans('backpack::hint.cars.youtube_link'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'preview_image', 'label' => trans('backpack::fields.preview_image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '', 'hint' => trans('backpack::hint.cars.preview_image')]);
        CRUD::addField(['tab' => 'Автомобиль', 'name' => 'feed_image', 'label' => trans('backpack::fields.feed_image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '', 'hint' => trans('backpack::hint.cars.feed_image')]);

        CRUD::addField([
            'tab' => 'Автомобиль',
            'name' => 'description',
            'label' => trans('backpack::fields.description'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'enterMode' => 2, 'shiftEnterMode' => 1,
                'height' => 500
            ]
        ]);
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
                'in_stock' => trans('backpack::fields.option.in_stock') . ' (in_stock)',
                'expect' => trans('backpack::fields.option.expect') . ' (expect)',
                'on_order' => trans('backpack::fields.option.on_order') . ' (on_order)',
                'on_order_usa' => trans('backpack::fields.option.on_order_usa') . ' (on_order_usa)',
                'on_order_korea' => trans('backpack::fields.option.on_order_korea') . ' (on_order_korea)',
                'sold' => trans('backpack::fields.option.sold') . ' (sold)',
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

        // Fields for full card template
        $this->addFullTemplate();
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
        request()->offsetUnset('categories');

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


    public function addFullTemplate()
    {
        CRUD::addField([
            'tab' => 'Поля для посадочной страницы',
            'name' => 'full_template',
            'label' => trans('backpack::fields.full_template'),
            'type' => 'checkbox',
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'tab' => 'Поля для посадочной страницы',
            'name' => 'equipments',
            'label' => trans('backpack::fields.equipments'),
            'type' => 'relationship',
            'entity' => 'equipments',
            'attribute' => 'title',
            'model' => Equipment::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
        ]);

        CRUD::addField([
            'tab' => 'Поля для посадочной страницы',
            'name' => 'benefits',
            'label' => trans('backpack::fields.text_image_block'),
            'type' => 'repeatable',
            'subfields' => [ // also works as: "fields"
                [
                    'name' => 'text',
                    'type' => 'ckeditor',
                    'label' => trans('backpack::fields.text'),
                    'options' => [
                        'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                        'enterMode' => 2, 'shiftEnterMode' => 1,
                    ]
                ],
                [
                    'name' => 'image',
                    'label' => trans('backpack::fields.image'),
                    'type' => 'image',
                    'disk' => 'public',
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
            ],

            'new_item_label' => 'Добавить элемент', // customize the text of the button
            'init_rows' => 1, // number of empty rows to be initialized, by default 1
            'max_rows' => 3, // maximum rows allowed, when reached the "new item" button will be hidden
        ]);

        CRUD::addField([
            'tab' => 'Поля для посадочной страницы',
            'name' => 'equipment',
            'label' => trans('backpack::fields.equipment'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'enterMode' => 2, 'shiftEnterMode' => 1,
            ]
        ]);
    }
}
