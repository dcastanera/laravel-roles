
## Roles & Permissions
This package is designed to provide a very basic roles and permissions structure
for Laravel 5.

## Installation
To install this roles package, you must use Composer. Type the following in your
Command Line Interface


    composer require dcastanera/roles


This should install all the roles files to your vendors directory.

Next we want to register the service provider in the /config/app.php file. Go to
the array for providers and enter the following:


    DCastanera\\Roles\\RolesServiceProvider::class,


Now we want to bring in the migrations by typing the following:


    php artisan vendor:publish


The above command copied a new migration into your migrations folder so now we
need to run a migration.


    php artisan migrate


In order for the roles to attach to the user, we need to add the Roleable trait
in the user model. Add the following to the top of the user model to include the
trait.


    use DCastanera\Roles\Roleable;


Then add the following inside the User class itself.


    use Roleable;
    

You should be all set after that.
