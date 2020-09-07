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

Route::get('/', 'LoginController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/request', 'RequestController@index');
Route::get('/request/create', 'RequestController@create');
Route::post('/request', 'RequestController@store');
Route::get('/request/{id}/edit', 'RequestController@edit');
Route::post('/request/{id}/edit', 'RequestController@update');

//Opciones unicas del administrador
Route::middleware(['auth', 'quotation'])->group(function () {
	Route::get('/admin/quotation/{id}/index', 'QuotationController@index');
	Route::get('/admin/quotation/{id}/create', 'QuotationController@create');
	Route::post('/admin/quotation/{id}', 'QuotationController@store');
	Route::get('/admin/quotation/{id}/edit', 'QuotationController@edit');
	Route::post('/admin/quotation/{id}/edit', 'QuotationController@update');

	Route::get('/admin/quotation/quotations', 'QuotationController@index');
	Route::get('/admin/quotation/{id}/detail', 'QuotationController@detail');

	Route::get('/mails/{id}/quotation_email', 'QuotationController@email');
});

/*Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/products', 'ProductController@index'); //listado de productos editar eliminar
	Route::get('/admin/products/create', 'ProductController@create'); //Crear productos //formulario de registro
	Route::post('/admin/products', 'ProductController@store'); //Crear productos //registrar información
	Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //Editar productos //formulario de edición
	Route::post('/admin/products/{id}/edit', 'ProductController@update'); //Actualizar información
});*/