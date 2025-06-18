<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Major
 * 
 * @property int $id
 * @property int|null $department_id
 * @property string $name
 * 
 * @property Department|null $department
 * @property Collection|Course[] $courses
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class Major extends Model
{
    use CrudTrait;
	protected $table = 'majors';
	public $timestamps = false;

	protected $casts = [
		'department_id' => 'int'
	];

	protected $fillable = [
		'department_id',
		'name'
	];

	public function department()
	{
		return $this->belongsTo(Department::class);
	}

	public function courses()
	{
		return $this->hasMany(Course::class);
	}

	public function students()
	{
		return $this->hasMany(Student::class);
	}
}
