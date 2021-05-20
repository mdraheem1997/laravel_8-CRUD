## Installation of node on ubuntu

https://computingforgeeks.com/install-node-js-14-on-ubuntu-debian-linux/

sudo apt update
curl -sL https://deb.nodesource.com/setup_14.x | sudo bash -
sudo apt -y install nodejs
node  -v

## Create project using composer

Open terminal at location /var/www/html/

composer create-project laravel/laravel example-app
cd example-app
php artisan serve

## Laravel sluggable

https://github.com/cviebrock/eloquent-sluggable

https://stackoverflow.com/questions/64180120/showing-slug-instead-of-id-for-crud-in-laravel-8

## Create migration, controller and model in 1 command

php artisan make:model Product -mcr

Here, [Product] is the model name

## Make model factory command

php artisan make:factory ProductFactory --model=Product

Here, [ProductFactory] is factory name and [Product] is model name

## Seed some products data using tinker.

php artisan tinker

Product::factory()->count(100)->create();

##  Install Yajra Datatable

composer require yajra/laravel-datatables-oracle

composer require yajra/laravel-datatables-buttons

In config/app.php add

.....
'providers' => [
	....
	Yajra\DataTables\DataTablesServiceProvider::class,
	Yajra\DataTables\ButtonsServiceProvider::class,
]
'aliases' => [
	....
	'DataTables' => Yajra\DataTables\Facades\DataTables::class,
]
.....

After adding above code fire following command

php artisan vendor:publish --tag=datatables-buttons


php artisan datatables:make Product

Here, [Product] is model-name





Install Node.js 14 on Ubuntu 20.04/18.04 & Debian 10/9 | ComputingForGeeks
https://computingforgeeks.com

https://deb.nodesource.com/setup_14.x

<!-- Datatable with export button HTMl 5 -->
https://datatables.net/extensions/buttons/examples/html5/simple.html
<!-- Datatable end -->

<!-- Jquery Validation -->
https://programmingfields.com/laravel-form-validation-using-jquery-form-validation/
<!-- ================================================= =-->