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

Route::group(
    [
        'prefix'     => 'administracao',
        'as'         => 'manager.',
        'middleware' => ['auth'],
    ],
    function() {
        //MENU
        Route::resource('cardapios', 'MenuController')
             ->names('menu');
    }
);

Route::group(
    [
        'prefix'     => 'painel',
        'as'         => 'painel.',
        'middleware' => ['auth'],
    ],
    function() {
        //MENU
        Route::resource('pedido', 'OrderController')
             ->names('order');
    }
);