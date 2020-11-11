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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    return " welcome to new project";
});

// template set.
Route::get('index' , 'AdminPagesController@index')->name('index');

Route::get('dashboard' , 'DashboardController@index')->name('dashboard');

Route::get('index' , 'DashboardController@index')->name('home.index');
Route::get('contact' , 'DashboardController@index')->name('contact');
Route::get('users' , 'DashboardController@index')->name('users');
Route::get('groups' , 'DashboardController@index')->name('groups');
Route::get('categories' , 'DashboardController@index')->name('categories');



Route::resource('products' , 'ProductsController');


Route::get('display' , 'PagesController@display')->name('display');
Route::get('product/{slug}' , 'PagesController@show')->name('product.show'); 
Route::get('search' , 'PagesController@search')->name('search'); 



Route::resource('categories' , 'CategoriesController');

