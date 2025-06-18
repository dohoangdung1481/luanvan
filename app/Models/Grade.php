<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Grade
 * 
 * @property int $id
 * @property int|null $enrollment_id
 * @property float|null $midterm_score
 * @property float|null $final_score
 * @property float|null $other_score
 * @property float|null $total_score
 * @property string|null $grade_char
 * @property string|null $status
 * 
 * @property Enrollment|null $enrollment
 *
 * @package App\Models
 */
class Grade extends Model
{
    use CrudTrait;
	protected $table = 'grades';
	public $timestamps = false;

	protected $casts = [
		'enrollment_id' => 'int',
		'midterm_score' => 'float',
		'final_score' => 'float',
		'other_score' => 'float',
		'total_score' => 'float'
	];

	protected $fillable = [
		'enrollment_id',
		'midterm_score',
		'final_score',
		'other_score',
		'total_score',
		'grade_char',
		'status'
	];

	public function enrollment()
	{
		return $this->belongsTo(Enrollment::class);
	}
}
