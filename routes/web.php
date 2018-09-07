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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');



// ADMIN Login Routes
Route::prefix('admin')->group(function (){

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

});

//COMPANY Login Routes & additional Routes
Route::prefix('company')->group(function () {

    Route::get('/login', 'Auth\CompanyLoginController@showLoginForm')->name('company.login');

    Route::post('/login', 'Auth\CompanyLoginController@login')->name('company.login.submit');

    Route::get('/logout', 'Auth\CompanyLoginController@logout')->name('company.logout');

    Route::get('/dashboard', 'CompanyController@dashboard')->name('company.dashboard');

    Route::post('/{company}/edit', 'CompanyController@sendEditForm')->name('company.edit.submit');

});

//EMPLOYEE Login Routes & additional Routes
Route::prefix('employee')->group(function (){

    Route::get('/login','Auth\EmployeeLoginController@showLoginForm')->name('employee.login');

    Route::post('/login','Auth\EmployeeLoginController@login')->name('employee.login.submit');

    Route::get('/logout', 'Auth\EmployeeLoginController@logout')->name('employee.logout');

    Route::get('/dashboard','EmployeeController@dashboard')->name('employee.dashboard');

    Route::get('/change','EmployeeController@changePasswordForm')->name('change.pass');

    Route::post('/change','EmployeeController@changePasswordPost')->name('change.pass.submit');

    Route::post('/{employee}/edit', 'EmployeeController@sendEditForm')->name('employee.edit.submit');
});

//COMPANY Resources Manage
Route::resource('company', 'CompanyController',['except' => ['update']]);

//EMPLOYEE Resources Manage
Route::resource('employee', 'EmployeeController',['except' => ['update']]);

//OCCUPATION Resource Manage
Route::resource('occupation','OccupationController');
