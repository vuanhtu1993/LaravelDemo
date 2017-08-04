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
Route::group(['prefix'=>'admin']); //group kiểu prefix có tên là admin