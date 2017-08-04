<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "TheLoai";

    public function loaitin(){
        return $this->hasMany('App\LoaiTin','idTheLoai','id'); //('Tên bảng, Khóa phụ, Khóa chính')
    }
    public function tintuc(){
        return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');//('Tên bảng cap 2, Tên bảng cấp 1 , Khóa phụ 1, Khóa phụ 2, Khóa chính')
    }
}
