<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $student_code
 * @property string $full_name
 * @property string $gender
 * @property Carbon|null $dob
 * @property int|null $department_id
 * @property int|null $major_id
 * @property string|null $class_name
 * @property Carbon|null $enrollment_year
 * @property string|null $academic_status
 * @property Carbon|null $created_at
 * 
 * @property User|null $user
 * @property Department|null $department
 * @property Major|null $major
 * @property Collection|CourseAttempt[] $course_attempts
 * @property Collection|Enrollment[] $enrollments
 *
 * @package App\Models
 */
class Student extends Model
{
    use CrudTrait;
	protected $table = 'students';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'dob' => 'datetime',
		'department_id' => 'int',
		'major_id' => 'int',
		'enrollment_year' => 'datetime'
	];

	protected $fillable = [
		'user_id',
		'student_code',
		'full_name',
		'gender',
		'dob',
		'department_id',
		'major_id',
		'class_name',
		'enrollment_year',
		'academic_status'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function major()
	{
		return $this->belongsTo(Major::class);
	}

	public function course_attempts()
	{
		return $this->hasMany(CourseAttempt::class);
	}

	public function enrollments()
	{
		return $this->hasMany(Enrollment::class);
	}

	public function getRegisteredCourses($studentId)
	{
		$student = Student::with('enrollments.class_section.course')->findOrFail($studentId);

		$courses = $student->enrollments->map(function ($enrollment) {
			$course = $enrollment->class_section->course ?? null;

			return $course ? [
				'course_code' => $course->course_code,
				'course_name' => $course->name,
				'credit' => $course->credit,
				'section_id' => $enrollment->class_section->id,
				'section_name' => $enrollment->class_section->name ?? null,
			] : null;
		})->filter(); // Loại bỏ null

		return response()->json($courses->values());
	}
}
