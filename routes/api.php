<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('pasword', function (){
    return bcrypt('younk');
});
//route menuju controllerProduk
Route::get('/Market','ProdukController@index')->name('task.index');
Route::get('/Market/{id}','ProdukController@show')->name('task.show');
Route::delete('/Market/{id}','ProdukController@destroy')->name('task.destroy');
Route::post('/Market/','ProdukController@store')->name('task.store');
Route::patch('/Market/{id}','ProdukController@update')->name('task.update');


//Kategori
Route::get('/Kategori','KategoriController@index')->name('task.index');
Route::get('/Kategori/{id}','KategoriController@show')->name('task.show');
Route::delete('/Kategori/{id}','KategoriController@destroy')->name('task.destroy');
Route::post('/Kategori/','KategoriController@store')->name('task.store');
Route::patch('/Kategori/{id}','KategoriController@update')->name('task.update');



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('wajib', 'AuthController@wajib');

});

