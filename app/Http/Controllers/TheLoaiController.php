<?php

namespace App\Http\Controllers;

use App\TheLoai; // sử dụng Model TheLoai
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        $theloai = TheLoai::all(); //gán biến $theloai = TheLoai::all() để tìm các thành phần của bảng TheLoai
        return view('admin.theloai.danhsach', ['theloai' => $theloai]); //truyền biến $theloai vào view danhsach
    }

    public function getThem()
    {

        return view('admin.theloai.them');
    }

    public function postThem(Request $request) { //Request $request to receive from function Post

        $this->validate($request,[
            'Ten' =>'required|min:3|max:100'
        ],
        [
          'Ten.required'=>'Chưa nhập tên thể loại', //chưa nhập gì đã upload
            'Ten.min'=>'Tên thể loại phải có từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải có từ 3 đến 100 kí tự'
        ]);
        $theloai = new TheLoai();
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công'); //show on view

    }

    public function getSua()
    {

    }
}
