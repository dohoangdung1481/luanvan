<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 * 
 * @property int $id
 * @property int|null $class_section_id
 * @property string $weekday
 * @property int|null $start_period
 * @property int|null $end_period
 * @property string|null $room
 * 
 * @property ClassSection|null $class_section
 *
 * @package App\Models
 */
class Schedule extends Model
{
    use CrudTrait;
	protected $table = 'schedules';
	public $timestamps = false;

	protected $casts = [
		'class_section_id' => 'int',
		'start_period' => 'int',
		'end_period' => 'int'
	];

	protected $fillable = [
		'class_section_id',
		'weekday',
		'start_period',
		'end_period',
		'room'
	];

	public function class_section()
	{
		return $this->belongsTo(ClassSection::class);
	}
}
