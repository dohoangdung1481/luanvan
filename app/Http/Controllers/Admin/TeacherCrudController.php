<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeacherRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TeacherCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TeacherCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Teacher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/giao-vien');
        CRUD::setEntityNameStrings('Giáo viên', 'Giáo viên');
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

        CRUD::column('teacher_code')->label('Mã giáo viên');

        CRUD::column('full_name')->label('Họ và tên');

        CRUD::column('gender')->label('Giới tính')->type('enum')
            ->options([
                'male'=> 'Nam',
                'female'=> 'Nữ',
                'other'=> 'Khác',
            ]);

        CRUD::column('dob')->label('Ngày sinh')->type('date');

        CRUD::column('department_id')->label('Khoa')->type('select')
            ->entity('department')
            ->attribute('name')
            ->model(\App\Models\Department::class);

        CRUD::column('academic_rank')->label('Học hàm')->type('enum')
            ->options([
                'Giáo sư'=> 'Giáo sư',
                'Phó Giáo sư'=> 'Phó Giáo sư',
                'Tiến sĩ'=> 'Tiến sĩ',
                'Thạc sĩ'=> 'Thạc sĩ',
                'Cử nhân'=> 'Cử nhân',
            ]);

        CRUD::column('degree')->label('Học vị')->type('enum')
            ->options([
                'Tiến sĩ'=> 'Tiến sĩ',
                'Thạc sĩ'=> 'Thạc sĩ',
                'Cử nhân'=> 'Cử nhân',
                'Kỹ sư'=> 'Kỹ sư',
                'Cao đẳng'=> 'Cao đẳng',
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
        CRUD::setValidation(TeacherRequest::class);

        CRUD::field('user_id')->label('Người dùng')->type('select')
            ->entity('user')
            ->attribute('name')
            ->model(\App\Models\User::class);

        CRUD::field('teacher_code')->label('Mã giáo viên');

        CRUD::field('full_name')->label('Họ và tên');

        CRUD::field('gender')->label('Giới tính')->type('enum')
            ->options([
                'male'=> 'Nam',
                'female'=> 'Nữ',
                'other'=> 'Khác',
            ]);

        CRUD::field('dob')->label('Ngày sinh')->type('date');

        CRUD::field('department_id')->label('Khoa')->type('select')
            ->entity('department')
            ->attribute('name')
            ->model(\App\Models\Department::class);

        CRUD::field('academic_rank')->label('Học hàm')->type('enum')
            ->options([
                'Giáo sư'=> 'Giáo sư',
                'Phó Giáo sư'=> 'Phó Giáo sư',
                'Tiến sĩ'=> 'Tiến sĩ',
                'Thạc sĩ'=> 'Thạc sĩ',
                'Cử nhân'=> 'Cử nhân',
            ]);

        CRUD::field('degree')->label('Học vị')->type('enum')
            ->options([
                'Tiến sĩ'=> 'Tiến sĩ',
                'Thạc sĩ'=> 'Thạc sĩ',
                'Cử nhân'=> 'Cử nhân',
                'Kỹ sư'=> 'Kỹ sư',
                'Cao đẳng'=> 'Cao đẳng',
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
