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
    return view('auth.login');
});

Auth::routes();
Route::resource('customers', 'CustomerController');
Route::resource('categories', 'CategoryController');
Route::resource('places','PlaceController');

Route::post('events/pesquisa', 'EventController@findByName');
Route::get('events/por_categoria', 'EventController@sortByCategory');
Route::get('events/por_data', 'EventController@sortByDate');
Route::get('events/assentos/{id}','EventController@seats')->where('id', '[0-9]+');
Route::post('events/assentos/salvar','EventController@saveSeat');
Route::get('events/bilhetes','EventController@totalOfTicketsEvent');
Route::resource('events', 'EventController');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mytickets','UserController@myTickets');
Route::get('/cadastrar','UserController@create');
Route::get('/clientes','UserController@index');
Route::post('/salvar','UserController@store');
Route::get('/mytickets/return/{id}','UserController@returnTicket')->where('id', '[0-9]+');;