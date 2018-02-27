<?php

namespace DCastanera\Roles;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $table = 'permissions';

	protected $fillable = [
		'name',
		'slug',
		'description',
	];

	/**
	 * Roles
	 * This Eloquent method returns all roles attached to this permission.
	 * @return  Collection  Array of Role objects.
	 */
	public function roles()
	{
		return $this->belongsToMany('App\Models\User\Role');
	}

	/**
	 * Users
	 * This Eloquent method returns all users attached to this permission.
	 * @return  Collection  Array of User objects.
	 */
	public function users()
	{
		return $this->belongsToMany('App\Models\User\User');
	}
}
