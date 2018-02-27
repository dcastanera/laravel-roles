<?php

namespace DCastanera\Roles;

trait Roleable
{

    /**
	 * Permissions
	 * This Eloquent method returns all permissions attached to this user.
	 * @return  Collection  Array of Permission objects.
	 */
	public function permissions()
	{
		return $this->belongsToMany('DCastanera\Roles\Permission');
	}

	/**
	 * Roles
	 * This Eloquent method returns all roles attached to this user.
	 * @return  Collection  Array of Role objects.
	 */
	public function roles()
	{
		return $this->belongsToMany('DCastanera\Roles\Role');
	}

	/**
	 * Has Role
	 * This function loops through the attached roles and returns true/false
	 * if the role is attached.
	 * @param   String  $role_name  'admin'
	 * @return  bool
	 */
	public function has_role($role_name)
	{
		// Check to see if it's an array of roles.
		if (is_array($role_name)) {
			// Loop through the array of roles to check.
			foreach ($role_name as $name) {
				// Loop through the User assigned roles.
				foreach ($this->roles as $role) {
					// Check to see if the names match
					if ($name == $role->name) {
						// If they do return true.
						return true;
					}
				}
			}
		}
		// This is a single role
		else {
			// Loop through the User assigned roles.
			foreach ($this->roles as $role) {
				// Check to see if the names match
				if ($role_name == $role->name) {
					// If they do return true.
					return true;
				}
			}

			return false;
		}
	}
}
