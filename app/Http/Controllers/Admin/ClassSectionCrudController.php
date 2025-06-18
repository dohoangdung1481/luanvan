<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClassSectionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClassSectionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClassSectionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\ClassSection::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lop-hoc-phan');
        CRUD::setEntityNameStrings('Lớp học phần', 'Lớp học phần');


    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('course_id')->label('Môn học')->type('select')
            ->entity('course')
            ->attribute('name')
            ->model(\App\Models\Course::class);

        CRUD::column('teacher_id')->label('Giảng viên')->type('select')
            ->entity('teacher')
            ->attribute('full_name')
            ->model(\App\Models\Teacher::class);

        CRUD::column('academic_year_id')
            ->label('Niên khóa')
            ->type('select')
            ->entity('academic_year')
            ->model(\App\Models\AcademicYear::class)
            ->attribute('display_name');


        CRUD::column('room')->label('Phòng học');

        CRUD::column('max_students')->label('Số lượng tối đa');

        CRUD::column('group_code')->label('Mã nhóm');

        CRUD::column('section_code')->label('Mã lớp');

        CRUD::column('schedule')->label('Lịch học')->type('select')
            ->entity('schedules')
            ->attribute('schedule')
            ->model(\App\Models\Schedule::class);


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
        CRUD::setValidation(ClassSectionRequest::class);

        CRUD::field('course_id')->label('Môn học')->type('select')
            ->entity('course')
            ->attribute('name')
            ->model(\App\Models\Course::class);

        CRUD::field('teacher_id')->label('Giảng viên')->type('select')
            ->entity('teacher')
            ->attribute('full_name')
            ->model(\App\Models\Teacher::class);

         CRUD::field('academic_year_id')
            ->label('Niên khóa')
            ->type('select')
            ->entity('academic_year')
            ->model(\App\Models\AcademicYear::class)
            ->attribute('display_name'); // accessor vừa tạo

        CRUD::field('room')->label('Phòng học');

        CRUD::field('max_students')->label('Số lượng tối đa');
        
        CRUD::field('group_code')->label('Mã nhóm');

        CRUD::field('section_code')->label('Mã lớp');


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
