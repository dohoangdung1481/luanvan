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
 * Class Enrollment
 * 
 * @property int $id
 * @property int|null $student_id
 * @property int|null $class_section_id
 * @property Carbon|null $enrolled_at
 * @property Carbon|null $registered_at
 * @property int|null $attempt_number
 * @property float|null $tuition_fee
 * @property bool|null $is_retake
 * 
 * @property Student|null $student
 * @property ClassSection|null $class_section
 * @property Collection|EnrollmentChange[] $enrollment_changes
 * @property Collection|Grade[] $grades
 *
 * @package App\Models
 */
class Enrollment extends Model
{
    use CrudTrait;
	protected $table = 'enrollments';
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'class_section_id' => 'int',
		'enrolled_at' => 'datetime',
		'registered_at' => 'datetime',
		'attempt_number' => 'int',
		'tuition_fee' => 'float',
		'is_retake' => 'bool'
	];

	protected $fillable = [
		'student_id',
		'class_section_id',
		'enrolled_at',
		'registered_at',
		'attempt_number',
		'tuition_fee',
		'is_retake'
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function class_section()
	{
		return $this->belongsTo(ClassSection::class);
	}

	public function enrollment_changes()
	{
		return $this->hasMany(EnrollmentChange::class);
	}

	public function grades()
	{
		return $this->hasMany(Grade::class);
	}

	public function getStudentClassSectionAttribute()
    {
        $studentName = $this->student->full_name ?? 'N/A Student';
        $sectionCode = $this->class_section->section_code ?? 'N/A Section';
        $courseName = $this->class_section->course->name ?? 'N/A Course'; // Assuming class_section has a course relation

        return "{$studentName} - {$courseName} ({$sectionCode})";
    }
}
