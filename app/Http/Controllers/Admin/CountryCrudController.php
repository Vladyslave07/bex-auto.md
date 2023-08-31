<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\CountryRequest;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CountryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CountryCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;
    use BulkDeleteOperation;
    use CloneOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Country::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/country');
        CRUD::setEntityNameStrings(trans('backpack::crud.country'), trans('backpack::crud.countries'));
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
                'name' => 'image',
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
        CRUD::setValidation(CountryRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'default' => '1', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'image', 'label' => trans('backpack::fields.image'), 'type' => 'image', 'disk' => 'public', 'destination_path' => 'countries', 'thumb_prefix' => '', 'hint' => 'size 207x136', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField([
            'name' => 'text',
            'label' => trans('backpack::fields.country_text'),
            'type' => 'repeatable',
            'subfields' => [
                [
                    'name' => 'title',
                    'type' => 'text',
                    'label' => trans('backpack::fields.title'),
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
                [
                    'name' => 'value',
                    'type' => 'ckeditor',
                    'label' => 'Текст',
                    'options' => [
                        'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                        'height' => 500
                    ]
                ],
            ],
            'max_rows' => 1,
        ]);

        CRUD::addField([
            'name' => 'auction_images',
            'label' => trans('backpack::fields.auction_images'),
            'type' => 'repeatable',
            'subfields' => [
                [
                    'name' => 'logo',
                    'type' => 'image',
                    'label' => trans('backpack::fields.auction_logo'),
                    'disk' => 'public',
                    'destination_path' => 'auction_logo',
                    'thumb_prefix' => '',
                    'wrapper' => ['class' => 'form-group col-md-4'],
                ],
                [
                    'name' => 'link',
                    'type' => 'text',
                    'hint' => 'Добавлять ссылку без домена и языковой версии',
                    'label' => trans('backpack::fields.link'),
                    'wrapper' => ['class' => 'form-group col-md-6'],
                ],
            ],
            'max_rows' => 6,
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
