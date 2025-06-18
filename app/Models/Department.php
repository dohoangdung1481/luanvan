<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * 
 * @property int $id
 * @property string $name
 * 
 * @property Collection|Major[] $majors
 * @property Collection|Student[] $students
 * @property Collection|Teacher[] $teachers
 *
 * @package App\Models
 */
class Department extends Model
{
    use CrudTrait;
	protected $table = 'departments';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function majors()
	{
		return $this->hasMany(Major::class);
	}

	public function students()
	{
		return $this->hasMany(Student::class);
	}

	public function teachers()
	{
		return $this->hasMany(Teacher::class);
	}
}
