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

Route::post('/request/{id}/rechaza', 'RequestController@rechaza');
Route::post('/request/{id}/cancela', 'RequestController@cancela');

//Opciones unicas del administrador
Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/admin/quotation/{id}/index', 'QuotationController@index');
	Route::get('/admin/quotation/{id}/create', 'QuotationController@create');
	Route::post('/admin/quotation/{id}', 'QuotationController@store');
	Route::get('/admin/quotation/{id}/edit', 'QuotationController@edit');
	Route::post('/admin/quotation/{id}/edit', 'QuotationController@update');

	Route::get('/admin/quotation/quotations', 'QuotationController@index');//opcion para el reporte general
	Route::get('/admin/quotation/{id}/detail', 'QuotationController@detail');
	Route::get('/admin/quotation/{id}/detailcotizacion', 'QuotationController@detailcotizacion');

	Route::get('/mails/{id}/quotation_email', 'QuotationController@email');

	Route::get('/estados', 'OptionController@estados');
	Route::get('/estados/pendiente', 'OptionController@pendientes');

	Route::get('/compra/{id}/index', 'BuyController@index');
	Route::post('/compra/{id}', 'BuyController@store');

	//Route::get('/admin/pending', 'PendingController@index');
});

/*Rutas que se ejecutan por fuera de la apliación*/
Route::get('/mails/{id}/aceptar_email', 'AutorizacionController@acepta');
Route::get('/mails/{id}/autoriza_email', 'AutorizacionController@autoriza');


//Route::get('/mails/{id}/aprueba_email', 'AutorizacionController@aprueba');

//Route::get('/mails/{id}/rechaza_email', 'AutorizacionController@rechaza');
//Route::get('/mails/{id}/autoriza_email', 'AutorizacionController@autoriza');
//Route::get('/mails/{id}/aprueba_email', 'AutorizacionController@aprueba');

/*Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/products', 'ProductController@index'); //listado de productos editar eliminar
	Route::get('/admin/products/create', 'ProductController@create'); //Crear productos //formulario de registro
	Route::post('/admin/products', 'ProductController@store'); //Crear productos //registrar información
	Route::get('/admin/products/{id}/edit', 'ProductController@edit'); //Editar productos //formulario de edición
	Route::post('/admin/products/{id}/edit', 'ProductController@update'); //Actualizar información
});*/