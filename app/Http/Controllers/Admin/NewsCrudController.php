<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\NewsRequest;
use App\Models\Delivery;
use App\Models\Domain;
use App\Models\Faq;
use App\Models\News;
use App\Models\SeoText;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings(trans('backpack::crud.news'), trans('backpack::crud.news_plural'));
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
            'name'  => 'id',
            'label' => '№',
        ]);
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
        CRUD::setValidation(NewsRequest::class);

        CRUD::addField(['tab' => 'Новость', 'name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['tab' => 'Новость', 'name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);

        CRUD::addField(['tab' => 'Новость', 'name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField([
            'tab' => 'Новость',
            'name' => 'domain',
            'label' => trans('backpack::fields.domain'),
            'type' => 'relationship',
            'entity' => 'domain',
            'attribute' => 'title',
            'model' => Domain::class,
            'options' => (function ($query) {
                return $query->orderBy('title', 'asc')->get();
            }),
            'wrapperAttributes' => ['class' => 'form-group col-md-6']
        ]);
        CRUD::addField(['tab' => 'Новость', 'name' => 'title', 'label' => trans('backpack::fields.title'), 'type' => 'simplemde']);


        CRUD::addField([
            'tab' => 'Новость',
            'name' => 'preview_text',
            'label' => trans('backpack::fields.preview_text'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR
            ]
        ]);
        CRUD::addField(['tab' => 'Новость',
            'name' => 'detail_text',
            'label' => trans('backpack::fields.detail_text'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR
            ]]);

        CRUD::addField([
            'tab' => 'Новость',
            'name' => 'image',
            'label' => trans('backpack::fields.image'),
            'disk' => 'public',
            'type' => 'image',
            'wrapperAttributes' => ['class' => 'form-group col-md-6'],
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
        CRUD::addField([
            'tab' => 'Новость',
            'name' => 'created_at',
            'label' => trans('backpack::fields.created_at'),
            'type' => 'datetime',
            'attributes' => [
                'disabled'    => 'disabled',
            ],
            'wrapperAttributes' => ['class' => 'form-group col-md-6', 'disabled' => true]
        ]);
        CRUD::addField([
            'tab' => 'Новость',
            'name' => 'updated_at',
            'label' => trans('backpack::fields.updated_at'),
            'type' => 'datetime',
            'attributes' => [
                'disabled'    => 'disabled',
            ],
            'wrapperAttributes' => ['class' => 'form-group col-md-6', 'disabled' => true]
        ]);
        $this->setupCreateOperation();
    }

    public function update() {

        $response = $this->traitUpdate();
        // do something after update

        // Clear news list cache
        News::clearCacheNewsList();
        Cache::forget(app(News::class)->getTable() . '_' . $response->getRequest()->slug);

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

        $article = News::query()->where('id', $id)->first(['slug']);
        Cache::forget(app(News::class)->getTable() . '_' . $article->slug);

        $response = $this->traitDestroy($id);

        // do something after save
        // Clear news list cache
        News::clearCacheNewsList();


        return $response;
    }
}
