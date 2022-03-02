<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogcontroller;
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
Route::get('/Message/{name}/{id?}',function ($val1,$val2 = null){

    echo 'welcome ,  '.$val1.'& id = '.$val2;
})->where([ 'id' => '[0-9]+' , 'name' => '[a-zA-Z]+' ]  );


Route::get('/', function () {
    return view('welcome');
});
Route::get('createe', [blogcontroller::class,'create']);//url, METHOD
Route::post('storke', [blogcontroller::class,'storee']);
Route::post('profile', [blogcontroller::class,'loadData']);
Route::view('test','testSession');
Route::get('/', [blogcontroller::class,'index']);
Route::get('delete/{id}',[blogcontroller::class,'delete']);
Route::get('edit/{id}',[blogcontroller::class,'edit']);
Route::put('update/{id}',[blogcontroller::class,'update']);

Route::get("login",[blogcontroller::class,'login']);
Route::post("doLogin",[blogcontroller::class,'doLogin']);
Route::get("logOut",[blogcontroller::class,'logOut']);
Route::get('image','blogontroller@image');
Route::post('image-store','blogcontroller@imageStore')->name('image.store');
