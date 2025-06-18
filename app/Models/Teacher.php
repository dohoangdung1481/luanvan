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
 * Class Teacher
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $teacher_code
 * @property string $full_name
 * @property string $gender
 * @property Carbon|null $dob
 * @property int|null $department_id
 * @property string|null $academic_rank
 * @property string|null $degree
 * 
 * @property User|null $user
 * @property Department|null $department
 * @property Collection|ClassSection[] $class_sections
 * @property Collection|TeachingAssignment[] $teaching_assignments
 *
 * @package App\Models
 */
class Teacher extends Model
{
    use CrudTrait;
	protected $table = 'teachers';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'dob' => 'datetime',
		'department_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'teacher_code',
		'full_name',
		'gender',
		'dob',
		'department_id',
		'academic_rank',
		'degree'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function class_sections()
	{
		return $this->hasMany(ClassSection::class);
	}

	public function teaching_assignments()
	{
		return $this->hasMany(TeachingAssignment::class);
	}
}
