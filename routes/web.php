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

Route::get('/projects', 'App\Http\Controllers\ProjectController@index');

Route::get('/users', 'App\Http\Controllers\UserController@index');

Route::get('email-test', function(){
    // $details['email'] = 'your_email@gmail.com';
    dispatch(new App\Jobs\GetUsers);
    });

    Route::get('send-bulk-mail', function(){
        $details['email'] = 'your_email@gmail.com';
        dispatch(new App\Jobs\SendBulkQueueEmail($details));
        dd('done');
    })->name('send-bulk-mail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
