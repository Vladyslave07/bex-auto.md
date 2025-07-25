<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Faq;
use App\Models\SeoText;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation {
        update as traitUpdate;
    }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation {
        destroy as traitDestroy;
    }
    use BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Category::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/category');
        CRUD::setEntityNameStrings(trans('backpack::crud.category'), trans('backpack::crud.categories'));
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
        CRUD::setValidation(CategoryRequest::class);

        CRUD::addField(['tab' => 'Категория', 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-3']]);
        CRUD::addField(['tab' => 'Категория', 'name' => 'show_in_slider', 'label' => trans('backpack::fields.show_in_slider'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-3']]);
        CRUD::addField(['tab' => 'Категория', 'name' => 'add_to_feed', 'label' => trans('backpack::fields.add_to_feed'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-5']]);
        CRUD::addField(['tab' => 'Категория', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500']);
        CRUD::addField(['tab' => 'Категория', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'],]);
        CRUD::addField(['tab' => 'Категория', 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'hint' => trans('backpack::hint.categories.slug') ,'wrapperAttributes' => ['class' => 'form-group col-md-6'],]);

        CRUD::addField([
            'tab' => 'Категория',
            'name' => 'h1',
            'label' => trans('backpack::fields.h1'),
            'type' => 'simplemde',
            'hint' => 'Доступные сниппеты: <code>#country#</code> <br> color-red: <span style="color: #e53934">Текст</span> <br> color-blue: <span style="color:#2a3d68">Текст</span>'
        ]);
        CRUD::addField([
            'tab' => 'Категория',
            'name' => 'sub_title',
            'label' => trans('backpack::fields.sub_title'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'enterMode' => 2, 'shiftEnterMode' => 1,
                'height' => 500
            ],
            'hint' => 'Доступные сниппеты: <code>#country#</code> <br> color-red: <span style="color: #e53934">Текст</span> <br> color-blue: <span style="color:#2a3d68">Текст</span>'
        ]);
        CRUD::addField([
            'tab' => 'Категория',
            'name' => 'sub_title_text',
            'label' => trans('backpack::fields.sub_title_text'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'enterMode' => 2, 'shiftEnterMode' => 1,
                'height' => 500
            ],
            'hint' => 'Доступные сниппеты: <code>#country#</code> <br> color-red: <span style="color: #e53934">Текст</span> <br> color-blue: <span style="color:#2a3d68">Текст</span>'
        ]);
        CRUD::addField([
            'tab' => 'Категория',
            'name'       => 'image',
            'label'      => trans('backpack::fields.image'),
            'type'       => 'image',
            'disk' => 'public',
        ]);

        CRUD::addField([
            'tab' => 'Категория',
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
            'tab' => 'Категория',
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
            'name' => 'domain_meta_title',
            'label' => trans('backpack::fields.meta_title'),
            'type' => 'text',
            'hint' => 'Доступные сниппеты <code>#title#</code>',
        ]);

        CRUD::addField([
            'tab' => 'SEO',
            'name' => 'domain_meta_description',
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
        $title = $this->crud->getRequest()->request->get('domain_meta_title');
        if (strlen($title) > 0){
            $this->crud->addField(['type' => 'hidden', 'name' => 'meta_title']);
            $this->crud->getRequest()->request->add(['meta_title'=> $title]);
        }

        $description = $this->crud->getRequest()->request->get('domain_meta_description');
        if (strlen($description) > 0){
            $this->crud->addField(['type' => 'hidden', 'name' => 'meta_description']);
            $this->crud->getRequest()->request->add(['meta_description'=> $description]);
        }

        $seoText = $this->crud->getRequest()->request->get('seo_text_id');
        if (strlen($seoText) > 0){
            $this->crud->addField(['type' => 'hidden', 'name' => 'seo_text_id']);
            $this->crud->getRequest()->request->add(['seo_text_id'=> $seoText]);
        }

        $response = $this->traitUpdate();
        // do something after update
        $request = $response->getRequest();

        Cache::forget(app(Category::class)->getTable() . '_' . $request->slug . '_' . $request->_locale);
        Cache::forget(Category::CATEGORIES_IN_SLIDER_CACHE_KEY);
        Cache::forget($request->seo_text_id . '_' . Category::SEO_TEXT_CACHE_KEY);

        return $response;
    }

    public function destroy($id) {

        $category = Category::query()->where('id', $id)->first(['slug']);

        // clear category cache with locale
        foreach (LaravelLocalization::getSupportedLocales() as $key => $locale) {
            $key = $key === 'uk' ? 'ua' : $key;
            Cache::forget(app(Category::class)->getTable() . '_' . $category->slug . '_' . $key);
        }

        // clear category seo text
        Cache::forget($category->seo_text_id . '_' . Category::SEO_TEXT_CACHE_KEY);

        $response = $this->traitDestroy($id);

        Cache::forget(Category::CATEGORIES_IN_SLIDER_CACHE_KEY);

        return $response;
    }
}
