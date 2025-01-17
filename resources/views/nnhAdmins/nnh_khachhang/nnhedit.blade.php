<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Khách Hàng</title>
</head>
<body>
    <section class="container">
        <form action="{{ route('nnh.editKHsubmit', ['id' => $khachHang->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin khách hàng</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nnhMakhachhang" class="col-sm-2 col-form-label">Mã Khách Hàng</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="nnhMakhachhang" name="nnhMakhachhang" value="{{ $khachHang->nnhMakhachhang }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhHotenkhachhang" class="col-sm-2 col-form-label">Họ Tên Khách Hàng</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhHotenkhachhang" name="nnhHotenkhachhang" value="{{ $khachHang->nnhHotenkhachhang }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="nnhEmail" name="nnhEmail" value="{{ $khachHang->nnhEmail }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhDienThoai" class="col-sm-2 col-form-label">Điện Thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhDienThoai" name="nnhDienThoai" value="{{ $khachHang->nnhDienThoai }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhDiaChi" class="col-sm-2 col-form-label">Địa Chỉ</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhDiaChi" name="nnhDiaChi" value="{{ $khachHang->nnhDiaChi }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhNgayDK" class="col-sm-2 col-form-label">Ngày Đăng Ký</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="nnhNgayDK" name="nnhNgayDK" value="{{ $khachHang->nnhNgayDK }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="nnhTrangThai1" name="nnhTrangThai" value="0" {{ $khachHang->nnhTrangThai == 0 ? 'checked' : '' }}>
                                <label for="nnhTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="nnhTrangThai2" name="nnhTrangThai" value="1" {{ $khachHang->nnhTrangThai == 1 ? 'checked' : '' }}>
                                <label for="nnhTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="{{ route('nnh.listkhachhang') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>