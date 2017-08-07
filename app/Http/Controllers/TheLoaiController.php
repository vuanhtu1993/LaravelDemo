<?php

namespace App\Http\Controllers;
use App\TheLoai; // sử dụng Model TheLoai
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
        $theloai = TheLoai::all(); //gán biến $theloai = TheLoai::all() để tìm các thành phần của bảng TheLoai
        return view('admin.theloai.danhsach',['theloai'=>$theloai]); //truyền biến $theloai vào view danhsach
    }
    public function getThem(){

    }
    public function getSua(){

    }
}
