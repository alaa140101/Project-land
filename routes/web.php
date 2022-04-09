<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

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
// routes/web.php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	
    Route::get('/', 'App\Http\Controllers\UserController@index');
    Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
   
    
    Route::get('/users', 'App\Http\Controllers\UserController@index');
    Route::post('/users', 'App\Http\Controllers\UserController@store')->name('user.store');
    
   

    Route::group(['middleware' => 'admin'], function () {

        Route::get('/projects/create', 'App\Http\Controllers\ProjectController@create')->name('project.create');
        Route::post('/projects/store', 'App\Http\Controllers\ProjectController@store')->name('project.store');
        Route::get('/projects/{id}/edit', 'App\Http\Controllers\ProjectController@edit')->name('project.edit');
        Route::patch('/projects/{id}/update', 'App\Http\Controllers\ProjectController@update')->name('project.update');

        Route::get('/sendEmails', 'App\Http\Controllers\SendBulkMailController@show');
        Route::post('/emails', 'App\Http\Controllers\SendBulkMailController@store')->name('sendbulkmail.store');

    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
