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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', function(){
    if (! auth()->user()) return redirect(route('login'));
    else return redirect(route('dashboard'));
})->name('loginform');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::name('cards')->resource('cards', 'DashboardController'); 

