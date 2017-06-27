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

    if(session('rol') != ''){
        if(session('rol')=="Estudiante" || session('rol')=='Trabajador'){
            return redirect('/user');
        }
        if(session('rol')=="Propietario"){
            return redirect('/propietary');
        }
        if(session('rol')=="Admin"){
            return redirect('/dashboard');
        }
    }

    return view('home');
});
Route::get('/propietaryinfo',function(){
    return view('propietary.propietaryinfo');
});
#ruta donde llegan los usuarios a escojer un rol para el sistema
Route::get('/userProfile/{id?}/{token?}','GeneralController@activeUser');
Route::post('/userProfile','GeneralController@activeRol');

Route::get('/home', 'HomeController@index');

Auth::routes();
//grup general
Route::group(['prefix'=>'general'],function(){
    Route::get('rol','GeneralController@roles');
    Route::get('cities/{id}','GeneralController@citiesFiel')->where('id','[0-9]+');
    Route::get('outskirt/{id}','GeneralController@outskirtWhere')->where('id','[0-9]+');
});

Route::group(['prefix'=>'dashboard'],function(){
    Route::get('/',function(){
        echo 'admin';
    });
});
//group propietary

Route::group(['middleware'=>'auth','prefix' => 'propietary'], function () {

    Route::get('/','PropietaryController@index');

    Route::get('/advertisements','PropietaryController@all');
    
    Route::get('/register', 'PropietaryController@formOferta');

    Route::get('/show/{id?}',function ($id =null){

    })->where('id', '[0-9]+');
    Route::get('/contact',function (){
        return view('Opp algo a pasado');
    });
    //post
    Route::post('/register','PropietaryController@registerOferta');
    Route::post('/upload','PropietaryController@imgLoad');
    //put
    Route::put('/register',function (){

    });

});

Route::group(['prefix'=>'admin'],function(){

});


Route::get('/email',function(){

    return view("email.Registro")->with(['user'=>\Illuminate\Support\Facades\Auth::user()]);
});

Route::post("/form",function (\Illuminate\Http\Request $request){
    var_dump($request->all());
});
