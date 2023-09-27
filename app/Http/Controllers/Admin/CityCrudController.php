<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CityRequest;
use App\Models\SeoText;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CityCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CityCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\City::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/city');
        CRUD::setEntityNameStrings(trans('backpack::crud.city'), trans('backpack::crud.cities'));
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
        CRUD::setColumns([
            [
                'name'  => 'id',
                'label' => '№',
            ],
            [
                'name'  => 'title',
                'label' => trans('backpack::fields.title'),
            ],
            [
                'name'  => 'sort',
                'label' => trans('backpack::fields.sort'),
            ],
            [
                'name'  => 'active',
                'label' => trans('backpack::fields.active'),
                'type'  => 'check'
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
        CRUD::setValidation(CityRequest::class);

        CRUD::addField(['tab' => trans('backpack::crud.city'), 'name' => 'active', 'default' => true,  'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => trans('backpack::crud.city'), 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => trans('backpack::crud.city'), 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => trans('backpack::crud.city'), 'name' => 'title_m', 'label' => trans('backpack::fields.title_m'), 'type' => 'text', 'hint' => trans('backpack::hint.city.title_m'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => trans('backpack::crud.city'), 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug'), 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);


        CRUD::addField([
            'tab' => trans('backpack::crud.city'),
            'name' => 'seo_text_id',
            'label' => trans('backpack::fields.seo_text'),
            'type' => 'relationship',
            'entity'    => 'text',
            'model'     => SeoText::class,
            'attribute' => 'title',
            'options'   => (function ($query) {
                $texts = $query->orderBy('title', 'asc')->get();
                foreach ($texts as $text) {
                    $text->title = str_replace(['&nbsp;', 'nbsp;'],' ',strip_tags($text->title));
                }

                return $texts;
            }),
        ]);

        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'meta_title',
            'label' => trans('backpack::fields.meta_title'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code> <code>#title_m#</code>',
        ]);

        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'meta_description',
            'label' => trans('backpack::fields.meta_description'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code> <code>#title_m#</code>',
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
