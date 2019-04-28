<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('index',[
'as'=>'trang-chu',
'uses'=>'PageController@getIndex'
]);


Route::get('loai-san-pham/{type}',[
'as'=>'loaisanpham',
'uses'=>'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}',[
'as'=>'chitiet_sanpham',
'uses'=>'PageController@getChitiet'
]);	



Route::get('lien-he',[
'as'=>'lienhe',
'uses'=>'PageController@getLienHe'
]);	


Route::get('gioi-thieu',[
'as'=>'gioithieu',
'uses'=>'PageController@getGioithieu'
]);	
