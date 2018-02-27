
# Roles & Permissions
This package is designed to provide a very basic roles and permissions structure
for Laravel 5.

## Installation
To install this roles package, you must use Composer. Type the following in your
Command Line Interface


    composer require dcastanera/roles


This should install all the roles files to your vendors directory.

### Service Provider
Next we want to register the service provider in the /config/app.php file. Go to
the array for providers and enter the following:


    DCastanera\Roles\RolesServiceProvider::class,

### Database Migrations
Now we want to bring in the migrations by typing the following:


    php artisan vendor:publish


The above command copied a new migration into your migrations folder so now we
need to run a migration.


    php artisan migrate

### User Model
In order for the roles to attach to the user, we need to add the Roleable trait
in the user model. Add the following to the top of the user model to include the
trait.


    use DCastanera\Roles\Roleable;


Then add the following inside the class after ```use notifiable```.


    use Roleable;


You should be all set after that.

## Roles
To use Roles you need to make sure you reference the Roles model.

    use DCastanera\Roles\Role;

### Creating Roles
To create a role you can try the following:

    $role = new Role;
    $role->name = 'Super Administrator';
    $role->slug = 'super';
    $role->description = 'This is the Super Administrator role.';
    $role->save();

or you can also use the create method:

    $role = Role::create([
        'name' => 'Administrator',
        'slug' => 'admin',
        'description' => 'This is the system Administrator.',
    ]);

both should function the same.

### Attaching Roles
To attach a role to a user, we simply need to call both objects and save them
using the eloquent roles method as follows:

    // First grab the user object
    $user = User::find(1);

    // Next grab the role object
    $role = Role::find(1);

    // Use the following to attach them.
    $user->roles()->save($role);

### Detaching Roles
To detach a role from a user, we simply need to call both objects and delete the
role from the roles method as follows:

    // First grab the user object
    $user = User::find(1);

    // Next grab the role object
    $role = Role::find(1);

    // Use the following to attach them.
    $user->roles()->delete($role);
