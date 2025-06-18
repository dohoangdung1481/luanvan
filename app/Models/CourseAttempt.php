<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseAttempt
 * 
 * @property int $id
 * @property int|null $student_id
 * @property int|null $course_id
 * @property int|null $attempt_number
 * @property int|null $academic_year_id
 * @property int|null $class_section_id
 * @property string $result
 * @property float|null $tuition_fee
 * @property Carbon|null $created_at
 * 
 * @property Student|null $student
 * @property Course|null $course
 * @property AcademicYear|null $academic_year
 * @property ClassSection|null $class_section
 *
 * @package App\Models
 */
class CourseAttempt extends Model
{
    use CrudTrait;
	protected $table = 'course_attempts';
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'course_id' => 'int',
		'attempt_number' => 'int',
		'academic_year_id' => 'int',
		'class_section_id' => 'int',
		'tuition_fee' => 'float'
	];

	protected $fillable = [
		'student_id',
		'course_id',
		'attempt_number',
		'academic_year_id',
		'class_section_id',
		'result',
		'tuition_fee'
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function academic_year()
	{
		return $this->belongsTo(AcademicYear::class);
	}

	public function class_section()
	{
		return $this->belongsTo(ClassSection::class);
	}
}
