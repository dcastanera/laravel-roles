
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
