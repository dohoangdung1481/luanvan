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
 * Class Course
 * 
 * @property int $id
 * @property string $course_code
 * @property string $name
 * @property int $credit
 * @property int|null $theory_hours
 * @property int|null $practice_hours
 * @property int|null $major_id
 * @property int|null $semester_number
 * @property float|null $base_fee
 * @property int|null $max_attempts
 * @property string|null $credit_type
 * @property Carbon|null $created_at
 * 
 * @property Major|null $major
 * @property Collection|ClassSection[] $class_sections
 * @property Collection|CourseAttempt[] $course_attempts
 * @property Collection|TeachingAssignment[] $teaching_assignments
 *
 * @package App\Models
 */
class Course extends Model
{
    use CrudTrait;
	protected $table = 'courses';
	public $timestamps = false;

	protected $casts = [
		'credit' => 'int',
		'theory_hours' => 'int',
		'practice_hours' => 'int',
		'major_id' => 'int',
		'semester_number' => 'int',
		'base_fee' => 'float',
		'max_attempts' => 'int'
	];

	protected $fillable = [
		'course_code',
		'name',
		'credit',
		'theory_hours',
		'practice_hours',
		'major_id',
		'semester_number',
		'base_fee',
		'max_attempts',
		'credit_type'
	];

	public function major()
	{
		return $this->belongsTo(Major::class);
	}

	public function class_sections()
	{
		return $this->hasMany(ClassSection::class);
	}

	public function course_attempts()
	{
		return $this->hasMany(CourseAttempt::class);
	}

	public function teaching_assignments()
	{
		return $this->hasMany(TeachingAssignment::class);
	}
}
