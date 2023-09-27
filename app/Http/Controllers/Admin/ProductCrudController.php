<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
    use \App\Traits\DropzoneTrait;
    use \App\Traits\BulkDeleteOperation;
    use \App\Traits\FormFilterTrait;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings(trans('backpack::crud.product'), trans('backpack::crud.products'));
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
        CRUD::setValidation(ProductRequest::class);

        CRUD::addField(['tab' => 'Товар', 'name' => 'active', 'default' => 1, 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField([
            'tab' => 'Товар',
            'name' => 'slug',
            'target'  => 'title',
            'label' => trans('backpack::fields.slug'),
            'type' => 'slug',
            'hint' => trans('backpack::hint.categories.slug'),
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField(['tab' => 'Товар', 'name' => 'price', 'label' => trans('backpack::fields.price'), 'type' => 'number', 'attributes' => ["step" => "any"], 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['tab' => 'Товар', 'name' => 'created_at', 'label' => trans('backpack::fields.created_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'updated_at', 'label' => trans('backpack::fields.updated_at'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'attributes' => ['disabled' => 'disabled']]);
        CRUD::addField([
            'tab' => 'Товар',
            'name' => 'description',
            'label' => trans('backpack::fields.description'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'enterMode' => 2, 'shiftEnterMode' => 1,
                'height' => 500
            ]
        ]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'info', 'label' => trans('backpack::fields.info'), 'type' => 'text', 'hint' => trans('backpack::hint.info'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'youtube_link', 'label' => trans('backpack::fields.youtube_link'), 'type' => 'text', 'hint' => trans('backpack::hint.cars.youtube_link'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'preview_image', 'label' => trans('backpack::fields.preview_image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '', 'hint' => trans('backpack::hint.cars.preview_image')]);
        CRUD::addField(['tab' => 'Товар', 'name' => 'images', 'label' => trans('backpack::fields.images'), 'type' => 'dropzone', 'disk' => 'public', 'destination_path' => 'products', 'thumb_prefix' => '',]);

        CRUD::addField([
            'name' => 'category_id',
            'label' => trans('backpack::fields.category'),
            'type' => 'relationship',
            'entity' => 'category',
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
}
