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

Route::get('/', 'Admin\HomeController@index')->name('admin');
Route::get('/sanpham', 'Admin\SanphamController@index')->name('admin.list_sp');
//Route::poss('/sanpham/add', 'Admin\SanphamController@add')->name('admin.add_sp_post');
Route::get('/sanpham/add', 'Admin\SanphamController@add')->name('admin.add_sp');

Route::get('/category', 'Admin\CategoryController@index')->name('admin.list_category');
Route::post('/category/add', 'Admin\CategoryController@add')->name('admin.add_category');