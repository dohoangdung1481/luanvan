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
 * Class ClassSection
 * 
 * @property int $id
 * @property int|null $course_id
 * @property int|null $teacher_id
 * @property int|null $academic_year_id
 * @property string|null $room
 * @property int|null $max_students
 * @property string|null $group_code
 * @property string|null $section_code
 * @property string|null $schedule
 * @property Carbon|null $created_at
 * 
 * @property Course|null $course
 * @property Teacher|null $teacher
 * @property AcademicYear|null $academic_year
 * @property Collection|CourseAttempt[] $course_attempts
 * @property Collection|Enrollment[] $enrollments
 * @property Collection|Schedule[] $schedules
 *
 * @package App\Models
 */
class ClassSection extends Model
{
    use CrudTrait;
	protected $table = 'class_sections';
	public $timestamps = false;

	protected $casts = [
		'course_id' => 'int',
		'teacher_id' => 'int',
		'academic_year_id' => 'int',
		'max_students' => 'int'
	];

	protected $fillable = [
		'course_id',
		'teacher_id',
		'academic_year_id',
		'room',
		'max_students',
		'group_code',
		'section_code',
		'schedule'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function academic_year()
	{
		return $this->belongsTo(AcademicYear::class);
	}

	public function course_attempts()
	{
		return $this->hasMany(CourseAttempt::class);
	}

	public function enrollments()
	{
		return $this->hasMany(Enrollment::class);
	}

	public function schedules()
	{
		return $this->hasMany(Schedule::class);
	}
	
}
