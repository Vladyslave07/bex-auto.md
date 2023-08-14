<?php

namespace App\Http\Controllers\Admin;

use App\Helper\General;
use App\Http\Requests\SeoTextRequest;
use App\Models\SeoText;
use App\Traits\BulkDeleteOperation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Cache;

/**
 * Class SeoTextCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SeoTextCrudController extends CrudController
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
    use BulkDeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\SeoText::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/seo-text');
        CRUD::setEntityNameStrings(trans('backpack::crud.seo_text'), trans('backpack::crud.seo_texts'));
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
            [
                'name'  => 'main',
                'label' => trans('backpack::fields.main'),
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
        CRUD::setValidation(SeoTextRequest::class);

        CRUD::addField(['name' => 'active', 'label' => trans('backpack::fields.active'), 'type' => 'checkbox', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'main', 'label' => trans('backpack::fields.main'), 'type' => 'checkbox','wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'sort', 'label' => trans('backpack::fields.sort'), 'type' => 'number', 'default' => '500', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6']]);
        CRUD::addField([
            'name' => 'title',
            'label' => trans('backpack::fields.title'),
            'type' => 'tinymce',
            'hint' => 'color-red: <span style="color: #e53934">Текст</span> <br> color-blue: <span style="color:#2a3d68">Текст</span>'
        ]);
        CRUD::addField([
            'name' => 'text',
            'label' => trans('backpack::fields.text'),
            'type' => 'ckeditor',
            'options' => [
                'extraPlugins' => General::EXTRA_PLUGINS_FOR_CKEDITOR,
                'height' => 500
            ],
            'hint' => 'color-red: <span style="color: #e53934">Текст</span> <br> color-blue: <span style="color:#2a3d68">Текст</span>'
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

        Cache::forget( app(SeoText::class)->getTable(). '_' . $response->getRequest()->slug);
        Cache::forget(SeoText::MAIN_SEO_TEXT_CACHE_KEY);

        return $response;
    }

    public function create() {
        $response = $this->traitCreate();

        // do something after save

        Cache::forget(SeoText::MAIN_SEO_TEXT_CACHE_KEY);

        return $response;
    }

    public function destroy($id) {
        $text = SeoText::query()->where('id', $id)->first(['slug']);
        Cache::forget(app(SeoText::class)->getTable() . '_' . $text->slug);

        $response = $this->traitDestroy($id);

        // do something after save
        Cache::forget(SeoText::MAIN_SEO_TEXT_CACHE_KEY);

        return $response;
    }
}
