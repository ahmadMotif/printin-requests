<?php

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

Auth::routes();
// Manger Routes
Route::prefix('manage')
    ->middleware('role:superadministrator|Arbitrator|language_checker|finance|print')
    ->group( function () {
    // Dashboard
    Route::get('dashboard', 'Manage\ManageController@dashboard')
        ->name('manage.dashboard');
    // Employees
    Route::get('employees', 'Manage\EmployeesController@index')
        ->name('manage.employees');
});
Route::get('/home', 'HomeController@index')->name('home');
