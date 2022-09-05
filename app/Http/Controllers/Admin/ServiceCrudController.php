<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Models\Faq;
use App\Models\SeoText;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings(trans('backpack::crud.service'), trans('backpack::crud.services'));
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
                'name'  => 'slug',
                'label' => trans('backpack::fields.slug'),
            ],
            [
                'name'  => 'active',
                'label' => trans('backpack::fields.active'),
                'type'  => 'check'
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
        CRUD::setValidation(ServiceRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'summernote']);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text']);

        CRUD::addField(['name' => 'sub_title', 'label' => trans('backpack::fields.sub_title'), 'type' => 'summernote']);
        CRUD::addField(['name' => 'sub_title_text', 'label' => trans('backpack::fields.sub_title_text'), 'type' => 'summernote']);

        CRUD::addField([
            'name' => 'youtube_link', 'label' => trans('backpack::fields.youtube_link'),
            'type' => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            'hint' => trans('backpack::hint.cars.youtube_link'),
        ]);

        CRUD::addField([
            'name' => 'image',
            'label' => trans('backpack::fields.image'),
            'type' => 'image',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);


        CRUD::addField([
            'name' => 'faqs',
            'label' => trans('backpack::fields.faq'),
            'type' => 'relationship',
            'entity' => 'faqs',
            'attribute' => 'question',
            'model' => Faq::class,
            'options' => (function ($query) {
                return $query->orderBy('question', 'asc')->get();
            }),
            'hint' => trans('backpack::hint.categories.faqs'),
        ]);

        CRUD::addField([
            'name' => 'seo_text',
            'label' => trans('backpack::fields.seo_text'),
            'type' => 'relationship',
            'entity'    => 'seo_text',
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

        CRUD::addField(['name' => 'text', 'label' => trans('backpack::fields.text'), 'type' => 'summernote']);
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
