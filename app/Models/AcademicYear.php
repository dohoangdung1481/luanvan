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
 * Class AcademicYear
 * 
 * @property int $id
 * @property string|null $year
 * @property string $semester
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property Carbon|null $created_at
 * 
 * @property Collection|ClassSection[] $class_sections
 * @property Collection|CourseAttempt[] $course_attempts
 * @property Collection|RegistrationSession[] $registration_sessions
 * @property Collection|TeachingAssignment[] $teaching_assignments
 *
 * @package App\Models
 */
class AcademicYear extends Model
{
    use CrudTrait;
	protected $table = 'academic_years';
	public $timestamps = false;

	protected $casts = [
		'start_date' => 'datetime',
		'end_date' => 'datetime'
	];

	protected $fillable = [
		'year',
		'semester',
		'start_date',
		'end_date'
	];

	public function class_sections()
	{
		return $this->hasMany(ClassSection::class);
	}

	public function course_attempts()
	{
		return $this->hasMany(CourseAttempt::class);
	}

	public function registration_sessions()
	{
		return $this->hasMany(RegistrationSession::class);
	}

	public function teaching_assignments()
	{
		return $this->hasMany(TeachingAssignment::class);
	}

	public function getDisplayNameAttribute()
	{
		return $this->year . ' - Học kỳ ' . $this->semester;
	}
}
