<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\CRUD.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('nien-khoa', 'AcademicYearCrudController');
    Route::crud('co-van-hoc-tap', 'AdvisorCrudController');
    Route::crud('lop-hoc-phan', 'ClassSectionCrudController');
    Route::crud('hoc-phan', 'CourseCrudController');
    Route::crud('course-attempt', 'CourseAttemptCrudController');
    Route::crud('khoa', 'DepartmentCrudController');
    Route::crud('enrollment', 'EnrollmentCrudController');
    Route::crud('enrollment-change', 'EnrollmentChangeCrudController');
    Route::crud('diem-so', 'GradeCrudController');
    Route::crud('chuyen-nganh', 'MajorCrudController');
    Route::crud('model-has-permission', 'ModelHasPermissionCrudController');
    Route::crud('model-has-role', 'ModelHasRoleCrudController');
    Route::crud('notification', 'NotificationCrudController');
    Route::crud('permission', 'PermissionCrudController');
    Route::crud('registration-session', 'RegistrationSessionCrudController');
    Route::crud('role', 'RoleCrudController');
    Route::crud('role-has-permission', 'RoleHasPermissionCrudController');
    Route::crud('lich-hoc', 'ScheduleCrudController');
    Route::crud('student', 'StudentCrudController');
    Route::crud('student-schedule', 'StudentScheduleCrudController');
    Route::crud('student-semester-summary', 'StudentSemesterSummaryCrudController');
    Route::crud('giao-vien', 'TeacherCrudController');
    Route::crud('teaching-assignment', 'TeachingAssignmentCrudController');
}); // this should be the absolute last line of this file

/**
 * DO NOT ADD ANYTHING HERE.
 */
