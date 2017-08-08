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

use App\TheLoai;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('test',function (){
   $theloai = TheLoai::find(1);

   foreach ($theloai->loaitin as $loaitin){
       echo $loaitin->Ten."<br>";

   }
});
Route::get('admin',function (){
   return view('admin.layout.index');
});
Route::get('login',function (){
   return view('admin.login');
});
Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix'=>'theloai'],function (){
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('sua','TheLoaiController@getSua');

        Route::get('xoa','TheLoaiController@getXoa');

    });
    Route::group(['prefix'=>'loaitin'],function (){
        Route::get('danhsach','LoaiTinController@getDanhSach');
        Route::get('them','LoaiTinController@getThem');
        Route::get('sua','LoaiTinController@getSua');
    });
    Route::group(['prefix'=>'tintuc'],function (){
        Route::get('danhsach','TinTucController@getDanhSach');
        Route::get('them','TinTucController@getThem');
        Route::get('sua','TinTucController@getSua');
    });
}); //group Route kiểu prefix tên là admin route admin/theloai/danhsach