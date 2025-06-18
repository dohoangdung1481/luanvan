<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentSchedule
 * 
 * @property int $student_id
 * @property string $full_name
 * @property int $class_section_id
 * @property string $course_name
 * @property string $weekday
 * @property int|null $start_period
 * @property int|null $end_period
 * @property string|null $room
 * @property string|null $year
 * @property string $semester
 *
 * @package App\Models
 */
class StudentSchedule extends Model
{
    use CrudTrait;
	protected $table = 'student_schedule';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'class_section_id' => 'int',
		'start_period' => 'int',
		'end_period' => 'int'
	];

	protected $fillable = [
		'student_id',
		'full_name',
		'class_section_id',
		'course_name',
		'weekday',
		'start_period',
		'end_period',
		'room',
		'year',
		'semester'
	];
}
