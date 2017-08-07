@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->

                {{--Sẽ show thông báo nếu có  ->with('thongbao','Thêm thành công');--}}
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                    @endif

                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/theloai/them" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <label>Tên thể loại</label>
                            <input class="form-control" name="Ten" placeholder="Please Enter Category Name"/>
                        </div>
                        <button type="submit" class="btn btn-default">Category Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection