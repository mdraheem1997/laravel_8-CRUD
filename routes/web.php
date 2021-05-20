<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::group(['middleware'=>'frontlogin'],function(){
	Route::view('/add-admin','add-admin');
Route::post('/admin',[AdminController::class,'insert_admin']);
Route::get('manage-admin',[AdminController::class,'manage_admin']);
Route::get("/edit-admin/{id}",[AdminController::class,'edit_admin']);
Route::POST('/edit-admin',[AdminController::class,'update_admin']);
Route::get("/delete/{id}",[AdminController::class,'delete_admin']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', App\Http\Controllers\ProductController::class);