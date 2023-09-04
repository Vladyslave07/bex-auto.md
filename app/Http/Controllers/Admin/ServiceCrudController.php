<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\ServiceRequest;
use App\Models\Faq;
use App\Models\News;
use App\Models\SeoText;
use App\Models\Service;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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

        CRUD::addField(['tab' => 'Услуга', 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Услуга', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['tab' => 'Услуга', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'simplemde']);
        CRUD::addField(['tab' => 'Услуга', 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug')]);

        CRUD::addField(['tab' => 'Услуга', 'name' => 'sub_title', 'label' => trans('backpack::fields.sub_title'), 'type' => 'ckeditor', 'options' => ['extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR, 'enterMode' => 2, 'shiftEnterMode' => 1, 'height' => 200],]);
        CRUD::addField(['tab' => 'Услуга', 'name' => 'sub_title_text', 'label' => trans('backpack::fields.sub_title_text'), 'type' => 'ckeditor', 'options' => ['extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR, 'enterMode' => 2, 'shiftEnterMode' => 1, 'height' => 200]]);

        CRUD::addField([
            'tab' => 'Услуга',
            'name' => 'youtube_link', 'label' => trans('backpack::fields.youtube_link'),
            'type' => 'text',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
            'hint' => trans('backpack::hint.cars.youtube_link'),
        ]);

        CRUD::addField([
            'tab' => 'Услуга',
            'name' => 'image',
            'disk' => 'public',
            'label' => trans('backpack::fields.image'),
            'type' => 'image',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
        ]);


        CRUD::addField([
            'tab' => 'Услуга',
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
            'tab' => 'Услуга',
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

        CRUD::addField([
            'tab' => 'Услуга',
            'name' => 'text',
            'label' => trans('backpack::fields.text'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'enterMode' => 2, 'shiftEnterMode' => 1,
                'height' => 500
            ]
        ]);

        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'meta_title',
            'label' => trans('backpack::fields.meta_title'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code>',
        ]);

        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'meta_description',
            'label' => trans('backpack::fields.meta_description'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code>',
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

        $request = $response->getRequest();
        Cache::forget(app(Service::class)->getTable() . '_' . $request->slug . '_' . $request->_locale);

        return $response;
    }

    public function create() {
        $response = $this->traitCreate();

        // do something after save
        // Clear news list cache
        News::clearCacheNewsList();

        return $response;
    }

    public function destroy($id) {

        $category = Service::query()->where('id', $id)->first(['slug']);

        // clear category cache with locale
        foreach (LaravelLocalization::getSupportedLocales() as $key => $locale) {
            $key = $key === 'uk' ? 'ua' : $key;
            Cache::forget(app(Service::class)->getTable() . '_' . $category->slug . '_' . $key);
        }

        $response = $this->traitDestroy($id);

        return $response;
    }
}
