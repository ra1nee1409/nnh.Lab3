@extends('_layout.admins.nnh_master')
@section('title','Danh Sach Khach Hang')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      .nut{
            display: flex;
            text-align: center;
        }
        .nut a{
            
            margin-left: 10px;

        }
    </style>
</head>
@section('content-body')
    <div class="container">
        <div class="row ">
            <div class="col-12" >
                <h1>Danh Sách Khách Hàng</h1> 
                <a href="{{route('nnh.createKH.createsubmit')}}" class="btn btn-success" style="margin-left: 77%;"><i class="fa-solid fa-arrow-right"></i>Thêm Mới Loại Sản Phẩm </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Mã Khách Hàng</th>
                        <th>Họ Tên Khách Hàng </th>
                        <th>Email</th>
                        <th>Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày Đăng Ký</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nnhkhachhang as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nnhMakhachhang  }}</td>
                            <td>{{ $item->nnhHotenkhachhang }}</td>
                            <td>{{ $item->nnhEmail }}</td>
                            <td>{{ $item->nnhDienThoai }}</td>
                            <td>{{ $item->nnhDiaChi }}</td>
                            <td>{{ $item->nnhNgayDK }}</td>
                            <td>{{ $item->nnhTrangThai }}</td>
                            <td class="nut"> 
                                <a href="{{ route('nnh.chitietkh', ['id' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('nnh.editKHsubmit', ['id' => $item->id]) }}" class="btn btn-warning" style="font-weight: bold"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                <a href="{{ route('nnh.deleteKH', ['id' => $item->id]) }}" 
                                    class="btn btn-danger" style="font-weight: bold"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center">Chưa có thông Khách Hàng</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
             {{-- <!-- Liên kết phân trang -->
             <div class="d-flex justify-content-center">
                {{ $nnhkhachhang->links() }}
            </div> --}}
        </div>
    </div>
@endsection