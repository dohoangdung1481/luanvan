<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property string $role
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Notification[] $notifications
 * @property Collection|Student[] $students
 * @property Collection|Teacher[] $teachers
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use CrudTrait;
	protected $table = 'users';

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'password',
		'email',
		'role',
		'remember_token'
	];

	public function notifications()
	{
		return $this->hasMany(Notification::class);
	}

	public function students()
	{
		return $this->hasMany(Student::class);
	}

	public function teachers()
	{
		return $this->hasMany(Teacher::class);
	}

	public function setPasswordAttribute($value)
	{
		if ($value && \Illuminate\Support\Facades\Hash::needsRehash($value)) {
			$this->attributes['password'] = bcrypt($value);
		}
	}

}
