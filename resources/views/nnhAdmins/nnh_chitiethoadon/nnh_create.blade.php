@extends('_layout.admins.nnh_master')
@section('title','Thêm Mới CT Hóa Đơn')

@section('content-body')
<div class="container">
    <h2 class="my-4">Thêm Mới CT Hóa Đơn</h2>

    <form action="{{ route('nnh.createsubmitCTHD') }}" method="POST">
        @csrf
        <div>
            <label for="nnhHoaDonID">ID Hóa Đơn:</label>
            <select name="nnhHoaDonID" id="nnhHoaDonID"  class="form-control" required>
                @foreach($nnhHoaDon as $HoaDon)
                    <option value="{{ $HoaDon->id }}">{{ $HoaDon->nnhHotenKhachHang }}</option>
                @endforeach
            </select>
            @error('nnhHoaDonID')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="nnhSanPhamID">ID Sản Phẩm:</label>
            <select name="nnhSanPhamID" id="nnhSanPhamID"  class="form-control" required>
                @foreach($nnhSanPham as $SanPham)
                    <option value="{{ $SanPham->id }}">{{ $SanPham->nnhTenSanPham }}</option>
                @endforeach
            </select>
            @error('nnhSanPhamID')
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

        <!--Số Lượng Mua -->
        <div class="form-group mb-1">
            <label for="nnhSoLuongMua">Số Lượng Mua</label>
            <input type="number" name="nnhSoLuongMua" id="nnhSoLuongMua" class="form-control" value="{{ old('nnhSoLuongMua') }}" required>
            @error('nnhSoLuongMua')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Đơn Gia Mua -->
        <div class="form-group mb-1">
            <label for="nnhDonGiaMua">Đơn Giá Mua</label>
            <input type="number" name="nnhDonGiaMua" id="nnhDonGiaMua" class="form-control" value="{{ old('nnhDonGiaMua') }}">
            @error('nnhDonGiaMua')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Thành Tiền-->
        <div class="form-group mb-1">
            <label for="nnhThanhTien"> Thành Tiền</label>
            <input type="text" name="nnhThanhTien" id="nnhThanhTien" class="form-control" value="{{ old('nnhThanhTien') }}">
            @error('nnhThanhTien')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <!-- Trạng Thái -->
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
        <a href="{{ route('nnh.listCTHD') }}" class="btn btn-secondary">Quay Lại</a> 
    </form>
</div>
@endsection