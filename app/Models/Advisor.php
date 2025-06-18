<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advisor
 * 
 * @property int $id
 * @property string|null $advisor_code
 * @property string|null $full_name
 * @property Carbon|null $created_at
 *
 * @package App\Models
 */
class Advisor extends Model
{
    use CrudTrait;
	protected $table = 'advisors';
	public $timestamps = false;

	protected $fillable = [
		'advisor_code',
		'full_name'
	];
}
