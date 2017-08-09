<?php

namespace App\Http\Controllers;

use App\TheLoai; // sử dụng Model TheLoai
use Illuminate\Http\Request;

class TheLoaiController extends Controller
{

    public function getDanhSach()
    {
        $theloai = TheLoai::all(); //gán biến $theloai = TheLoai::all() để tìm các thành phần của bảng TheLoai
        return view('admin.theloai.danhsach', ['theloai' => $theloai]); //truyền biến $theloai ra view danhsach
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
    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin/theloai/sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,[
            'Ten'=>'required|min:3|max:100'
        ],[
            'Ten.required'=>'Chưa nhập thể loại mới',
            'Ten.min'=>'Tên thể loại phải có từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên thể loại phải có từ 3 đến 100 kí tự'
        ]);
        $ten = request('Ten');
        $theloai  = TheLoai::find($id);
        $theloai->Ten = $ten;
        $theloai->save();
        return back()->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){ // nhận giá trị $id từ route
        TheLoai::find($id)->delete();
        return back();
    }
}
