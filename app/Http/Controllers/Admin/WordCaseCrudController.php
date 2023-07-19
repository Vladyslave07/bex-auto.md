<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WordCaseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class WordCaseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WordCaseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\WordCase::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/word-case');
        CRUD::setEntityNameStrings(trans('backpack::crud.word_case'), trans('backpack::crud.word_cases'));
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
                'name'  => 'i',
                'label' => trans('backpack::fields.cases.i'),
                'type'  => 'text'
            ],
            [
                'name'  => 'slug',
                'label' => trans('backpack::fields.case_slug'),
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
        CRUD::setValidation(WordCaseRequest::class);

        CRUD::addField(['name' => 'slug', 'label' => trans('backpack::fields.case_slug'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-8']]);
        CRUD::addField(['name' => 'i', 'label' => trans('backpack::fields.cases.i'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.i')]);
        CRUD::addField(['name' => 'i_m', 'label' => trans('backpack::fields.cases.i_m'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.i_m')]);
        CRUD::addField(['name' => 'r', 'label' => trans('backpack::fields.cases.r'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.r')]);
        CRUD::addField(['name' => 'r_m', 'label' => trans('backpack::fields.cases.r_m'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.r_m')]);
        CRUD::addField(['name' => 'd', 'label' => trans('backpack::fields.cases.d'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.d')]);
        CRUD::addField(['name' => 'd_m', 'label' => trans('backpack::fields.cases.d_m'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.d_m')]);
        CRUD::addField(['name' => 'v', 'label' => trans('backpack::fields.cases.v'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.v')]);
        CRUD::addField(['name' => 'v_m', 'label' => trans('backpack::fields.cases.v_m'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.v_m')]);
        CRUD::addField(['name' => 't', 'label' => trans('backpack::fields.cases.t'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.t')]);
        CRUD::addField(['name' => 't_m', 'label' => trans('backpack::fields.cases.t_m'), 'type' => 'text', 'wrapperAttributes' => ['class' => 'form-group col-md-6'], 'hint' => trans('backpack::hint.word_cases.t_m')]);
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
