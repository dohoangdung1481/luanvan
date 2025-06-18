<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeachingAssignment
 * 
 * @property int $id
 * @property int|null $teacher_id
 * @property int|null $course_id
 * @property int|null $academic_year_id
 * 
 * @property Teacher|null $teacher
 * @property Course|null $course
 * @property AcademicYear|null $academic_year
 *
 * @package App\Models
 */
class TeachingAssignment extends Model
{
    use CrudTrait;
	protected $table = 'teaching_assignments';
	public $timestamps = false;

	protected $casts = [
		'teacher_id' => 'int',
		'course_id' => 'int',
		'academic_year_id' => 'int'
	];

	protected $fillable = [
		'teacher_id',
		'course_id',
		'academic_year_id'
	];

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function academic_year()
	{
		return $this->belongsTo(AcademicYear::class);
	}
}
