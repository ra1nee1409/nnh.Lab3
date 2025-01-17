@extends('_layout.admins.nnh_master')
@section('title','Danh Sach Khach Hang')
@section('content-body')
<div class="container">
    <h2 class="my-4">Thêm Mới Hóa Đơn</h2>

    <form action="{{ route('nnh.createsubmitHD') }}" method="POST">
        @csrf
        <div>
            <label for="nnhMaHoaDon">Mã hóa đơn:</label>
            <input type="text" name="nnhMaHoaDon" id="nnhMaHoaDon"  class="form-control" required>
            @error('nnhMaHoaDon')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    
        <div>
            <label for="nnhMakhachhang">Mã khách hàng:</label>
            <select name="nnhMakhachhang" id="nnhMakhachhang"  class="form-control" required>
                @foreach($nnhkhachhang as $khachhang)
                    <option value="{{ $khachhang->id }}">{{ $khachhang->nnhHotenkhachhang }}</option>
                @endforeach
            </select>
            @error('nnhMakhachhang')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ngày Hóa Đơn -->
        <div class="form-group mb-1">
            <label for="nnhNgayHoaDon">Ngày Hóa Đơn</label>
            <input type="date" name="nnhNgayHoaDon" id="nnhNgayHoaDon" class="form-control" value="{{ old('nnhNgayHoaDon') }}" required>
            @error('nnhNgayHoaDon')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Họ Tên Khách Hàng -->
        <div class="form-group mb-1">
            <label for="nnhHotenKhachHang">Họ Tên Khách Hàng</label>
            <input type="text" name="nnhHotenKhachHang" id="nnhHotenKhachHang" class="form-control" value="{{ old('nnhHotenKhachHang') }}" required>
            @error('nnhHotenKhachHang')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="form-group mb-1">
            <label for="nnhEmail">Email</label>
            <input type="email" name="nnhEmail" id="nnhEmail" class="form-control" value="{{ old('nnhEmail') }}">
            @error('nnhEmail')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Điện Thoại -->
        <div class="form-group mb-1">
            <label for="nnhDienThoai">Điện Thoại</label>
            <input type="text" name="nnhDienThoai" id="nnhDienThoai" class="form-control" value="{{ old('nnhDienThoai') }}">
            @error('nnhDienThoai')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Địa Chỉ -->
        <div class="form-group mb-1">
            <label for="nnhDiaChi">Địa Chỉ</label>
            <input type="text" name="nnhDiaChi" id="nnhDiaChi" class="form-control" value="{{ old('nnhDiaChi') }}">
            @error('nnhDiaChi')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Tổng Giá Trị -->
        <div class="form-group mb-1">
            <label for="nnhTongGiaTri">Tổng Giá Trị</label>
            <input type="number" name="nnhTongGiaTri" id="nnhTongGiaTri" class="form-control" value="{{ old('nnhTongGiaTri') }}" step="0.01" required>
            @error('nnhTongGiaTri')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <!-- Trạng Thái -->
        <div class="form-group mb-1">
            <label>Trạng Thái</label>
            <div>
                <input type="radio" id="active" name="nnhTrangThai" value="1" {{ old('nnhTrangThai') == '1' ? 'checked' : '' }} checked>
                <label for="active">Hiển Thị</label>

                <input type="radio" id="inactive" name="nnhTrangThai" value="0" {{ old('nnhTrangThai') == '0' ? 'checked' : '' }}>
                <label for="inactive">Khóa</label>
            </div>
            @error('nnhTrangThai')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Thêm Mới</button>
        <a href="{{ route('nnh.listHD') }}" class="btn btn-secondary">Quay Lại</a> 
    </form>
</div>
@endsection