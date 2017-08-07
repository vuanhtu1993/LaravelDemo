@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Tên không dấu</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php use App\TheLoai;
                foreach ($theloai as $row){ ?>
                <tr class="odd gradeX" align="center">
                    <td><?php echo $row->id ?></td>
                    <td><?php echo $row->Ten ?></td>
                    <td><?php echo $row->TenKhongDau ?></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa"> Delete</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$row->id}}">Edit</a></td>
                </tr>
                <?php } ?>;
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection