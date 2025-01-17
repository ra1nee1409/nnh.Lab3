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
        <form action="{{ route('nnh.editsubmitCTHD', ['id' => $nnhCTHoaDon->id]) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin hóa đơn</h3>
                </div>
                <div class="card-body">
                    <!-- Mã khách hàng -->
                    <div class="mb-3 row">
                        <label for="nnhHoaDonID" class="col-sm-2 col-form-label">ID Hoá Đơn</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="nnhHoaDonID" name="nnhHoaDonID">
                                @foreach ($nnhIDHoaDon as $HoaDon)
                                    <option value="{{ $HoaDon->id }}" {{ $nnhCTHoaDon->nnhHoaDonID == $HoaDon->id ? 'selected' : '' }}>
                                        {{ $HoaDon->id }} - {{ $HoaDon->nnhHotenKhachHang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <div class="card-body">
                    <!-- Mã khách hàng -->
                    <div class="mb-3 row">
                        <label for="nnhSanPhamID" class="col-sm-2 col-form-label">ID Sản Phẩm</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="nnhSanPhamID" name="nnhSanPhamID">
                                @foreach ($nnhIDSanPham as $SanPham)
                                    <option value="{{ $SanPham->id }}" {{ $nnhCTHoaDon->nnhSanPhamID == $SanPham->id ? 'selected' : '' }}>
                                        {{ $SanPham->id }} - {{ $SanPham->nnhTenSanPham}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Số Lượng Mua -->
                    <div class="mb-3 row">
                        <label for="nnhSoLuongMua" class="col-sm-2 col-form-label">Số Lượng Mua</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nnhSoLuongMua" name="nnhSoLuongMua" value="{{ $nnhCTHoaDon->nnhSoLuongMua }}">
                        </div>
                    </div>
                    <!-- Đơn Giá Mua -->
                    <div class="mb-3 row">
                        <label for="nnhDonGiaMua" class="col-sm-2 col-form-label">Đơn Giá Mua</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nnhDonGiaMua" name="nnhDonGiaMua" value="{{ $nnhCTHoaDon->nnhDonGiaMua }}">
                        </div>
                    </div>
                    <!-- Thành Tiền -->
                    <div class="mb-3 row">
                        <label for="nnhThanhTien" class="col-sm-2 col-form-label">Thành Tiền</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nnhThanhTien" name="nnhThanhTien" value="{{ $nnhCTHoaDon->nnhThanhTien }}">
                        </div>
                    </div>
                    <!-- Trạng thái -->
                    <div class="mb-3 row">
                        <label for="nnhnnhTrangThai" class="col-sm-2 col-form-label">Trạng Thái</label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="nnhnnhTrangThai1" name="nnhnnhTrangThai" value="0" {{ $nnhCTHoaDon->nnhnnhTrangThai == 0 ? 'checked' : '' }}>
                                <label for="nnhnnhTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="nnhnnhTrangThai2" name="nnhnnhTrangThai" value="1" {{ $nnhCTHoaDon->nnhnnhTrangThai == 1 ? 'checked' : '' }}>
                                <label for="nnhnnhTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Cập nhật</button>
                    <a href="{{ route('nnh.listCTHD') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>