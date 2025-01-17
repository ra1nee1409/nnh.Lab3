@extends('_layout.admins.nnh_master')
@section('title','Danh Sach San Pham')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
@section('content-body')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Danh Sách Sản Phẩm</h1> 
                <a href="{{route('nnh.createspsubmit')}}" class="btn btn-success"><i class="fa-solid fa-arrow-right"></i>Thêm Mới Sản Phẩm</a>
                <!-- Sử dụng flexbox cho nút Thêm Mới và ô tìm kiếm -->
                {{-- <div class="d-flex justify-content-between align-items-center">
                    
                    <form method="GET" action="{{ route('productTypes.timkiem') }}" class="d-flex mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ $search ?? '' }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> <!-- Icon tìm kiếm -->
                        </button>
                    </form>
                </div> --}}
            </div> 
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead> 
                    <tr>
                        <th>#</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th> 
                        <th>Hình Anh</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Mã Loại</th> 
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nnhsanpham as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nnhMaSanPham }}</td>
                            <td>{{ $item->nnhTenSanPham }}</td>
                            <td>
                                @if($item->nnhHinhAnh)
                                    <img src="{{ asset('images/' . $item->nnhHinhAnh) }}" alt="Hình ảnh" style="width: 100px; height: auto;">
                                @else
                                    Không có hình ảnh
                                @endif
                            </td>
                            <td>{{ $item->nnhSoLuong }}</td>
                            <td>{{ number_format($item->nnhDonGia, 0, ',', '.') }} VND</td>
                            <td>{{ $item->nnhMaloai }}</td>
                            <td>{{ $item->nnhTrangThai == 1 ? 'Hiển thị' : 'Khóa' }}</td>
                            <td>
                                <a href="{{ route('nnh.chitietsp', ['nnhID' => $item->id]) }}" class="btn btn-primary" style="font-weight: bold">
                                    Chi Tiết <i class="fa-solid fa-circle-info"></i>
                                </a>
                                <a href="{{ route('nnh.editsanphamsubmit', ['nnhID' => $item->id]) }}" class="btn btn-warning"  style="font-weight: bold">Sửa <i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                <a href="{{ route('admin-nnh.deletesp', ['id' => $item->id]) }}"
                                   class="btn btn-danger"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"  style="font-weight: bold">
                                   Xóa <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="9" class="text-center">Chưa có thông tin sản phẩm</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Liên kết phân trang -->
            {{-- <div class="d-flex justify-content-center">
                {{ $nnhsanpham->links() }}
            </div> --}}
        </div>
    </div>
@endsection