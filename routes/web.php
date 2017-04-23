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
    return view('home');
});
Route::get('/propietaryinfo',function(){
    return view('propietaryinfo');
});
#ruta donde llegan los usuarios a escojer un rol para el sistema
Route::get('/userProfile/{idUs}','GeneralController@activeUser')->where('idUs','[0-9]+');
Route::post('/userProfile','GeneralController@activeRol');

Route::get('/home', 'HomeController@index');

Auth::routes();
//grup general
Route::group(['prefix'=>'general'],function(){
    Route::get('rol','GeneralController@roles');
    Route::get('cities/{id}','GeneralController@citiesFiel')->where('id','[0-9]+');
    Route::get('outskirt/{id}','GeneralController@outskirtWhere')->where('id','[0-9]+');
});
Route::group(['prefix'=>'admin'],function(){
    Route::get('/dashboard',function(){
        echo 'admin';
    });
});
//group propietary
Route::group(['prefix' => 'propietary'], function () {

    //gets

    Route::get('/','PropietaryController@index');

    Route::get('/advertisements','PropietaryController@all');
    
    Route::get('/register', 'PropietaryController@formOferta');

    Route::get('show/{id}',function ($id =null){

    })->where('id', '[0-9]+');
    //post
    Route::post('/register','PropietaryController@registerOferta');
    //put
    Route::put('/register',function (){

    });

});

Route::group(['prefix'=>'admin'],function(){

});
