<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $message
 * @property Carbon|null $created_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Notification extends Model
{
    use CrudTrait;
	protected $table = 'notifications';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'title',
		'message'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
