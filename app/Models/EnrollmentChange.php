<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EnrollmentChange
 * 
 * @property int $id
 * @property int|null $enrollment_id
 * @property string $change_type
 * @property string|null $reason
 * @property int|null $refund_percent
 * @property bool|null $approved_by_advisor
 * @property Carbon|null $created_at
 * 
 * @property Enrollment|null $enrollment
 *
 * @package App\Models
 */
class EnrollmentChange extends Model
{
    use CrudTrait;
	protected $table = 'enrollment_changes';
	public $timestamps = false;

	protected $casts = [
		'enrollment_id' => 'int',
		'refund_percent' => 'int',
		'approved_by_advisor' => 'bool'
	];

	protected $fillable = [
		'enrollment_id',
		'change_type',
		'reason',
		'refund_percent',
		'approved_by_advisor'
	];

	public function enrollment()
	{
		return $this->belongsTo(Enrollment::class);
	}
}
