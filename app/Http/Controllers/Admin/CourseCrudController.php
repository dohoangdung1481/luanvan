<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Course::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/hoc-phan');
        CRUD::setEntityNameStrings('Học phần', 'Học phần');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        CRUD::column('major_id')->label('Chuyên ngành')->type('select')
            ->entity('major') // the method that defines the relationship in your Model
            ->model('App\Models\Major') // the model that defines the relationship
            ->attribute('name');

        CRUD::column('course_code')->label('Mã môn học');
        CRUD::column('name')->label('Tên môn học');
        CRUD::column('credit')->label('Số tín chỉ');
        CRUD::column('theory_hours')->label('Giờ lý thuyết');
        CRUD::column('practice_hours')->label('Giờ thực hành');
        CRUD::column('semester_number')->label('Học kỳ');
        CRUD::column('base_fee')->label('Học phí cơ bản');
        CRUD::column('max_attempts')->label('Số lần đăng ký tối đa');
        CRUD::column('credit_type')->label('Loại tín chỉ')->type('enum')
            ->options([
                'theory' => 'Lý thuyết',
                'practice' => 'Thực hành',
                'internship' => 'Thực tập',
                'project' => 'Dự án',
                'graduation' => 'Tốt nghiệp',
            ]);

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
        CRUD::setValidation(CourseRequest::class);
        CRUD::field('major_id')->label('Chuyên ngành')->type('select')
            ->entity('major') // the method that defines the relationship in your Model
            ->model('App\Models\Major') // the model that defines the relationship
            ->attribute('name');

        CRUD::field('course_code')->label('Mã môn học');
        CRUD::field('name')->label('Tên môn học');
        CRUD::field('credit')->label('Số tín chỉ');
        CRUD::field('theory_hours')->label('Giờ lý thuyết');
        CRUD::field('practice_hours')->label('Giờ thực hành');
        CRUD::field('semester_number')->label('Học kỳ');
        CRUD::field('base_fee')->label('Học phí cơ bản');
        CRUD::field('max_attempts')->label('Số lần đăng ký tối đa');
        CRUD::field('credit_type')->label('Loại tín chỉ')->type('enum')
            ->options([
                'theory' => 'Lý thuyết',
                'practice' => 'Thực hành',
                'internship' => 'Thực tập',
                'project' => 'Dự án',
                'graduation' => 'Tốt nghiệp',
            ]);
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
