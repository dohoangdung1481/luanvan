<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScheduleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ScheduleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScheduleCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Schedule::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lich-hoc');
        CRUD::setEntityNameStrings('Lịch học', 'Lịch học');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::column('class_section_id')->label('Lớp học phần')
        ->type('select')
        ->entity('class_section')
        ->model(\App\Models\ClassSection::class)
        ->attribute('section_code');

        CRUD::column('weekday')->type('enum')->label('Ngày trong tuần')
            ->options([
                'mon' => 'Thứ Hai',
                'tue' => 'Thứ Ba',
                'wed' => 'Thứ Tư',
                'thu' => 'Thứ Năm',
                'fri' => 'Thứ Sáu',
                'sat' => 'Thứ Bảy',
                'sun' => 'Chủ Nhật',
            ]);

        CRUD::column('start_period')->label('Tiết bắt đầu')->type('number')
            ->hint('Số tiết bắt đầu, ví dụ: 1 cho tiết 1, 2 cho tiết 2, ...');

        CRUD::column('end_period')->label('Tiết kết thúc')->type('number')
            ->hint('Số tiết kết thúc, ví dụ: 2 cho tiết 2, 3 cho tiết 3, ...');

        CRUD::column('room')->label('Phòng')->type('text')
            ->hint('Phòng học, ví dụ: A101, B202, ...');
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
        CRUD::setValidation(ScheduleRequest::class);
        CRUD::field('class_section_id')->label('Lớp học phần')
        ->type('select')
        ->entity('class_section')
        ->model(\App\Models\ClassSection::class)
        ->attribute('section_code');

        CRUD::field('weekday')->type('enum')->label('Ngày trong tuần')
            ->options([
                'mon' => 'Thứ Hai',
                'tue' => 'Thứ Ba',
                'wed' => 'Thứ Tư',
                'thu' => 'Thứ Năm',
                'fri' => 'Thứ Sáu',
                'sat' => 'Thứ Bảy',
                'sun' => 'Chủ Nhật',
            ]);

        CRUD::field('start_period')->label('Tiết bắt đầu')->type('number')
            ->hint('Số tiết bắt đầu, ví dụ: 1 cho tiết 1, 2 cho tiết 2, ...');

        CRUD::field('end_period')->label('Tiết kết thúc')->type('number')
            ->hint('Số tiết kết thúc, ví dụ: 2 cho tiết 2, 3 cho tiết 3, ...');

        CRUD::field('room')->label('Phòng')->type('text')
            ->hint('Phòng học, ví dụ: A101, B202, ...');
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
