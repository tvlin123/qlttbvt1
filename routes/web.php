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
    return view('admin/home/index');
});

Route::group(['prefix'=>'admin'],function(){

    Route::group(['prefix'=>'hinhthucxuat'],function(){
        Route::get('index','Admin\HinhThucXuatController@getIndex');
        Route::get('create','Admin\HinhThucXuatController@getCreate');
        Route::post('create','Admin\HinhThucXuatController@postCreate');
        Route::get('edit/{id}','Admin\HinhThucXuatController@getEdit');
        Route::post('edit/{id}','Admin\HinhThucXuatController@postEdit');
        Route::get('delete/{id}','Admin\HinhThucXuatController@getDelete');
    });
    Route::group(['prefix'=>'hinhthucnhap'],function(){
        Route::get('index','Admin\HinhThucNhapController@getIndex');
        Route::get('create','Admin\HinhThucNhapController@getCreate');
        Route::post('create','Admin\HinhThucNhapController@postCreate');
        Route::get('edit/{id}','Admin\HinhThucNhapController@getEdit');
        Route::post('edit/{id}','Admin\HinhThucNhapController@postEdit');
        Route::get('delete/{id}','Admin\HinhThucNhapController@getDelete');
    });
     Route::group(['prefix'=>'danhmucsp'],function(){
        Route::get('index','Admin\DanhMucSPController@getIndex');
        Route::get('create','Admin\DanhMucSPController@getCreate');
        Route::post('create','Admin\DanhMucSPController@postCreate');
        Route::get('edit/{id}','Admin\DanhMucSPController@getEdit');
        Route::post('edit/{id}','Admin\DanhMucSPController@postEdit');
        Route::get('delete/{id}','Admin\DanhMucSPController@getDelete');
    });
      Route::group(['prefix'=>'users'],function(){
        Route::get('index','Admin\UsersController@getIndex');
        Route::get('create','Admin\UsersController@getCreate');
        Route::post('create','Admin\UsersController@postCreate');
        Route::get('edit/{id}','Admin\UsersController@getEdit');
        Route::post('edit/{id}','Admin\UsersController@postEdit');
        Route::get('delete/{id}','Admin\UsersController@getDelete');
    });
      Route::group(['prefix'=>'sanpham'],function(){
        Route::get('index','Admin\SanPhamController@getIndex');
        Route::get('create','Admin\SanPhamController@getCreate');
        Route::post('create','Admin\SanPhamController@postCreate');
        Route::get('edit/{id}','Admin\SanPhamController@getEdit');
        Route::post('edit/{id}','Admin\SanPhamController@postEdit');
        Route::get('delete/{id}','Admin\SanPhamController@getDelete');
    });
      Route::group(['prefix'=>'phieuxuat'],function(){
        Route::get('index','Admin\PhieuXuatController@getIndex');


        Route::get('create','Admin\PhieuXuatController@getCreate');
        Route::post('create','Admin\PhieuXuatController@postCreate');
        Route::get('edit/{id}','Admin\PhieuXuatController@getEdit');
        Route::post('edit/{id}','Admin\PhieuXuatController@postEdit');
        Route::get('delete/{id}','Admin\PhieuXuatController@getDelete');
    });
      Route::group(['prefix'=>'phieunhap'],function(){
        Route::get('index','Admin\PhieuNhapController@getIndex');


        Route::get('create','Admin\PhieuNhapController@getCreate');
        Route::post('create','Admin\PhieuNhapController@postCreate');
        Route::get('edit/{id}','Admin\PhieuNhapController@getEdit');
        Route::post('edit/{id}','Admin\PhieuNhapController@postEdit');
        Route::get('delete/{id}','Admin\PhieuNhapController@getDelete');
    });
});
