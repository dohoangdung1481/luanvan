<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentSemesterSummary
 * 
 * @property int $student_id
 * @property string|null $year
 * @property string $semester
 * @property float|null $total_credits
 * @property float|null $gpa
 *
 * @package App\Models
 */
class StudentSemesterSummary extends Model
{
    use CrudTrait;
	protected $table = 'student_semester_summary';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'total_credits' => 'float',
		'gpa' => 'float'
	];

	protected $fillable = [
		'student_id',
		'year',
		'semester',
		'total_credits',
		'gpa'
	];
}
