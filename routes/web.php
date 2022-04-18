<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

/* Route::get('/about', function () {
    return 'About us';
});

Route::get('/user/{id}/{company}', function ($id, $company) {
    return 'User '.$id.' works for '.$company;
}); */

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');

Route::get('/users/{id}/{name}', 'PagesController@users');

Route::get('employee', 'EmployeeController@index');

//
Route::get('/add-employee', 'EmployeeController@create');
Route::post('store-employee', 'EmployeeController@store');
Route::get('/edit-employee/{id}', 'EmployeeController@edit');
Route::put('/update-employee/{id}', 'EmployeeController@update');
Route::get('/delete-employee/{id}', 'EmployeeController@destroy');
Auth::routes();
Route::get('/home', 'HomeController@index');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//===========  Resource  =====================

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('posts', 'PostController');
});

//Route::resource('posts', 'PostController');