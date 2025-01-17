<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Hóa Đơn</title>
</head>
<body>
    <section class="container mt-5">
        <form action="{{ route('nnh.editHDsubmit', ['id' => $nnhHoaDon->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin hóa đơn</h3>
                </div>
                <div class="card-body">
                    <!-- Mã hóa đơn -->
                    <div class="mb-3 row">
                        <label for="nnhMaHoaDon" class="col-sm-2 col-form-label">Mã Hóa Đơn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhMaHoaDon" name="nnhMaHoaDon" value="{{ $nnhHoaDon->nnhMaHoaDon }}" readonly>
                        </div>
                    </div>
                    <!-- Mã khách hàng -->
                    <div class="mb-3 row">
                        <label for="nnhMakhachhang" class="col-sm-2 col-form-label">Mã KH</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="nnhMakhachhang" name="nnhMakhachhang">
                                @foreach ($nnhloaikhachhang as $khachHang)
                                    <option value="{{ $khachHang->id }}" {{ $nnhHoaDon->nnhMakhachhang == $khachHang->id ? 'selected' : '' }}>
                                        {{ $khachHang->id }} - {{ $khachHang->nnhHotenKhachHang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Họ tên khách hàng -->
                    <div class="mb-3 row">
                        <label for="nnhHotenKhachHang" class="col-sm-2 col-form-label">Họ Tên Khách Hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhHotenKhachHang" name="nnhHotenKhachHang" value="{{ $nnhHoaDon->nnhHotenKhachHang }}">
                        </div>
                    </div>
                    <!-- Ngày hóa đơn -->
                    <div class="mb-3 row">
                        <label for="nnhNgayHoaDon" class="col-sm-2 col-form-label">Ngày Hóa Đơn</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="nnhNgayHoaDon" name="nnhNgayHoaDon" value="{{ $nnhHoaDon->nnhNgayHoaDon }}">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="mb-3 row">
                        <label for="nnhEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="nnhEmail" name="nnhEmail" value="{{ $nnhHoaDon->nnhEmail }}">
                        </div>
                    </div>
                    <!-- Điện thoại -->
                    <div class="mb-3 row">
                        <label for="nnhDienThoai" class="col-sm-2 col-form-label">Điện Thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhDienThoai" name="nnhDienThoai" value="{{ $nnhHoaDon->nnhDienThoai }}">
                        </div>
                    </div>
                    <!-- Địa chỉ -->
                    <div class="mb-3 row">
                        <label for="nnhDiaChi" class="col-sm-2 col-form-label">Địa Chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhDiaChi" name="nnhDiaChi" value="{{ $nnhHoaDon->nnhDiaChi }}">
                        </div>
                    </div>
                    <!-- Tổng giá trị -->
                    <div class="mb-3 row">
                        <label for="nnhTongGiaTri" class="col-sm-2 col-form-label">Tổng Giá Trị</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nnhTongGiaTri" name="nnhTongGiaTri" value="{{ $nnhHoaDon->nnhTongGiaTri }}" step="0.01" min="0">
                        </div>
                    </div>
                    <!-- Trạng thái -->
                    <div class="mb-3 row">
                        <label for="nnhTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="nnhTrangThai1" name="nnhTrangThai" value="0" {{ $nnhHoaDon->nnhTrangThai == 0 ? 'checked' : '' }}>
                                <label for="nnhTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="nnhTrangThai2" name="nnhTrangThai" value="1" {{ $nnhHoaDon->nnhTrangThai == 1 ? 'checked' : '' }}>
                                <label for="nnhTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('nnh.listHD') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>