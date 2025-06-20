<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GradeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class GradeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class GradeCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Grade::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/diem-so');
        CRUD::setEntityNameStrings('Điểm số', 'Điểm số');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('enrollment_id')->label('Thông tin sinh viên - môn học')->type('select')
            ->entity('enrollment')
            ->attribute('student_class_section')
            ->model(\App\Models\Enrollment::class);
        
        CRUD::column('midterm_score')->label('Điểm giữa kỳ');

        CRUD::column('final_score')->label('Điểm cuối kỳ');

        CRUD::column('other_score')->label('Điểm khác');

        CRUD::column('total_score')->label('Điểm tổng');

        CRUD::column('grade_char')->label('Xếp loại');

        CRUD::column('status')->label('Trạng thái')->type('enum')
        ->options([
                'passed'=> 'Qua môn',
                'failed'=> 'Rớt',
            ]);;

        
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
        CRUD::setValidation(GradeRequest::class);

        CRUD::field('enrollment_id')->label('Thông tin sinh viên - môn học')->type('select')
            ->entity('enrollment')
            ->attribute('student_class_section')
            ->model(\App\Models\Enrollment::class);
        
        CRUD::field('midterm_score')->label('Điểm giữa kỳ');

        CRUD::field('final_score')->label('Điểm cuối kỳ');

        CRUD::field('other_score')->label('Điểm khác');

        CRUD::field('total_score')->label('Điểm tổng');

        CRUD::field('grade_char')->label('Xếp loại');

        CRUD::field('status')->label('Trạng thái')->type('enum')
        ->options([
                'passed'=> 'Qua môn',
                'failed'=> 'Rớt',
            ]);;

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
