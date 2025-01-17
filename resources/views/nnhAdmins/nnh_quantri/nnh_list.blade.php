@extends('_layout.admins.nnh_master')
@section('title','Danh Sach Admin')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
@section('content-body')
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <h1>Danh Sách Admin</h1>
                <a href="{{ route('admin-nnh.createQT') }}" class="btn btn-success">Thêm Mới</a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>id</th>
                        <th>Tài Khoản</th>
                        <th>Mật Khẩu </th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nnhquantri as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->id}}</td>
                            <td>{{ $item->nnhTaiKhoan}}</td>
                            <td>{{ $item->nnhMatKhau}}</td>
                            <td>{{ $item->nnhTrangThai}}</td>
                            <td > 
                                <a href="{{ route('admin-nnh.chitietqt', ['id' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold">Chi Tiết <i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('admin-nnh.editsubmitqt', ['id' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold">Sửa <i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('admin-nnh.deleteqt', ['id' => $item->id]) }}" 
                                    class="btn btn-danger" style="font-weight: bold"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa  <i class="fa-solid fa-trash"></i></a>
                            </td>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="6" class="text-center">Chưa có thông tin quản trị</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection