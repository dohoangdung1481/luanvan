<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MajorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MajorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MajorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Major::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/chuyen-nganh');
        CRUD::setEntityNameStrings('Chuyên ngành', 'Chuyên ngành');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // set columns from db columns.

        CRUD::column('department_id')->label('Khoa')->type('select')
            ->entity('department') // the method that defines the relationship in your Model
            ->model('App\Models\Department') // the model that defines the relationship
            ->attribute('name'); // the attribute on the related model to show in the column

        CRUD::column('name')->label('Tên chuyên ngành');
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MajorRequest::class);
        // CRUD::setFromDb(); // set fields from db columns.

        CRUD::field('department_id')->label('Khoa')->type('select')
            ->entity('department') // the method that defines the relationship in your Model
            ->model('App\Models\Department') // the model that defines the relationship
            ->attribute('name'); // the attribute on the related model to show in the field
        
        CRUD::field('name')->label('Tên chuyên ngành');

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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
