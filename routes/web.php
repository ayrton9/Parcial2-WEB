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
    return view('index');
});


Route::get('/v/{id}', function($id,$pro,$des,$mon){
    return view("_Producto")->with(compact(['id'=>$id,'Producto'=>$pro,'des'=>$des, 'monto' =>$mon]));
});
