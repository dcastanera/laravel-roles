<?php

namespace DCastanera\Roles;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
	 * Permissions
	 * This Eloquent method returns all permissions attached to this role.
	 * @return  Collection  Array of Permission objects.
	 */
	public function permissions()
	{
		return $this->belongsToMany('DCastanera\Roles\Permission');
	}

	/**
	 * Users
	 * This Eloquent method returns all users attached to this role.
	 * @return  Collection  Array of User objects.
	 */
	public function users()
	{
		return $this->belongsToMany(config('auth.providers.users.model'));
	}
}
