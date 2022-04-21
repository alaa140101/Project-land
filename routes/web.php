<?php

use Illuminate\Support\Facades\Route;

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
	
    Route::group(['middleware' => 'admin'], function () {
        
        Route::resource('/projects', 'App\Http\Controllers\ProjectController');

        // Route::get('/users', 'App\Http\Controllers\UserController@index');

        Route::get('/sendEmails', 'App\Http\Controllers\SendBulkMailController@show');
        Route::post('/emails', 'App\Http\Controllers\SendBulkMailController@store')->name('sendbulkmail.store');
    });
    
    Route::get('/', 'App\Http\Controllers\ProjectController@all')->name('projects.all');
    Route::get('/myprojects', 'App\Http\Controllers\ProjectController@index');
    Route::get('/projects/{id}/show', 'App\Http\Controllers\ProjectController@show')->name('project.show');
    Route::get('/subscribers', 'App\Http\Controllers\SubscriberController@index');
    Route::post('/subscribers', 'App\Http\Controllers\SubscriberController@store')->name('subscriber.store');
    
    Auth::routes();
});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
