<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Sản Phẩm</title>
</head>
<body>
    <section class="container">
        <form action="{{ route('nnh.editsanphamsubmit', ['nnhID' => $nnhsanpham->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin sản phẩm cập nhật</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nnhMaSanPham" class="col-sm-2 col-form-label">
                            Mã Sản Phẩm:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="nnhMaSanPham" name="nnhMaSanPham" value="{{ $nnhsanpham->nnhMaSanPham }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhTenSanPham" class="col-sm-2 col-form-label">
                            Tên Sản Phẩm:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhTenSanPham" name="nnhTenSanPham" value="{{ $nnhsanpham->nnhTenSanPham }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhHinhAnh" class="col-sm-2 col-form-label">
                            Hình Ảnh:
                        </label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="nnhHinhAnh" name="nnhHinhAnh">
                            @if ($nnhsanpham->nnhHinhAnh)
                                <p>Hình ảnh hiện tại:</p>
                                <img src="{{ asset('images/' . $nnhsanpham->nnhHinhAnh) }}" alt="Ảnh hiện tại" width="100">
                            @else
                                <p>Chưa có hình ảnh. Bạn có thể tải lên ảnh mới.</p>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhSoLuong" class="col-sm-2 col-form-label">
                            Số Lượng:
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nnhSoLuong" name="nnhSoLuong" value="{{ $nnhsanpham->nnhSoLuong }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhDonGia" class="col-sm-2 col-form-label">
                            Đơn Giá:
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="nnhDonGia" name="nnhDonGia" value="{{ $nnhsanpham->nnhDonGia }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhMaloai" class="col-sm-2 col-form-label">Mã Loại:</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="nnhMaloai" name="nnhMaloai">
                                @foreach ($nnhloaisanpham as $loai)
                                    <option value="{{ $loai->nnhMaloai }}" {{ $loai->nnhMaloai == $nnhsanpham->nnhMaloai ? 'selected' : '' }}>
                                        {{ $loai->nnhTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhTrangThai" class="col-sm-2 col-form-label">
                            Trạng Thái:
                        </label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="nnhTrangThai1" name="nnhTrangThai" value="0" {{ $nnhsanpham->nnhTrangThai == 0 ? 'checked' : '' }}>
                                <label for="nnhTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="nnhTrangThai2" name="nnhTrangThai" value="1" {{ $nnhsanpham->nnhTrangThai == 1 ? 'checked' : '' }}>
                                <label for="nnhTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="/nnhAdmins/nnh-san-pham" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
