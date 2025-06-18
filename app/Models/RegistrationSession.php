<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistrationSession
 * 
 * @property int $id
 * @property int|null $academic_year_id
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property Carbon|null $allow_withdrawal_until
 * @property bool|null $is_active
 * 
 * @property AcademicYear|null $academic_year
 *
 * @package App\Models
 */
class RegistrationSession extends Model
{
    use CrudTrait;
	protected $table = 'registration_sessions';
	public $timestamps = false;

	protected $casts = [
		'academic_year_id' => 'int',
		'start_date' => 'datetime',
		'end_date' => 'datetime',
		'allow_withdrawal_until' => 'datetime',
		'is_active' => 'bool'
	];

	protected $fillable = [
		'academic_year_id',
		'start_date',
		'end_date',
		'allow_withdrawal_until',
		'is_active'
	];

	public function academic_year()
	{
		return $this->belongsTo(AcademicYear::class);
	}
}
