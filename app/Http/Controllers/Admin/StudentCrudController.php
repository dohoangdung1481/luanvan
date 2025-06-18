<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StudentRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

use function PHPSTORM_META\type;

/**
 * Class StudentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class StudentCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Student::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/student');
        CRUD::setEntityNameStrings('student', 'students');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('user_id')->label('Người dùng')->type('select')
            ->entity('user')
            ->attribute('name')
            ->model(\App\Models\User::class);
        CRUD::column('department_id')->label('Khoa')->type('select')
            ->entity('department')
            ->attribute('name')
            ->model(\App\Models\Department::class);
        CRUD::column('major_id')->label('Chuyên ngành')->type('select')
            ->entity('major')
            ->attribute('name')
            ->model(\App\Models\Major::class);
        CRUD::column('student_code')->label('Mã sinh viên');
        CRUD::column('full_name')->label('Họ và tên');
        CRUD::column('gender')->label('Giới tính')->type('enum')
            ->options([
                'male'=> 'Nam',
                'female'=> 'Nữ',
                'other'=> 'Khác',
            ]);;
        CRUD::column('dob')->label('Ngày sinh')->type('date');
        CRUD::column('class_name')->label('Lớp');

        CRUD::column('academic_status')->label('Học lực')->type('enum')
            ->options([
                'normal'=> 'Trung bình',
                'weak'=> 'Yếu',
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
        CRUD::setValidation(StudentRequest::class);
        CRUD::field('user_id')->label('Người dùng')->type('select')
            ->entity('user')
            ->attribute('name')
            ->model(\App\Models\User::class);
        CRUD::field('department_id')->label('Khoa')->type('select')
            ->entity('department')
            ->attribute('name')
            ->model(\App\Models\Department::class);
        CRUD::field('major_id')->label('Chuyên ngành')->type('select')
            ->entity('major')
            ->attribute('name')
            ->model(\App\Models\Major::class);
        CRUD::field('student_code')->label('Mã sinh viên');
        CRUD::field('full_name')->label('Họ và tên');
        CRUD::field('gender')->label('Giới tính')->type('enum')
            ->options([
                'male'=> 'Nam',
                'female'=> 'Nữ',
                'other'=> 'Khác',
            ]);;
        CRUD::field('dob')->label('Ngày sinh')->type('date');
        CRUD::field('class_name')->label('Lớp');

        CRUD::field('academic_status')->label('Học lực')->type('enum')
            ->options([
                'normal'=> 'Trung bình',
                'weak'=> 'Yếu',
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
