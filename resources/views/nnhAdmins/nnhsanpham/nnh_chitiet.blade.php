<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thông tin chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <div class="card">
            <div class="card-header">
                <h3>Thông tin chi tiết sản phẩm</h3>
            </div>
            <div class="card-body">
                @if ($nnhsanpham)
                    <p class="card-text">
                        <b>Mã Sản Phẩm:</b> {{ $nnhsanpham->nnhMaSanPham }}
                    </p>
                    <p>
                        <b>Tên Sản Phẩm:</b> {{ $nnhsanpham->nnhTenSanPham }}
                    </p>
                    <p>
                        <b style="margin-right:49px ">Hình Ảnh:</b> 
                        @if($nnhsanpham->nnhHinhAnh)
                            <img src="{{ asset('images/' . $nnhsanpham->nnhHinhAnh) }}" alt="Hình Ảnh" class="img-fluid" style="max-width: 200px;">
                        @else
                            Không có hình ảnh
                        @endif
                    </p>
                    <p>
                        <b>Số Lượng:</b> {{ $nnhsanpham->nnhSoLuong }}
                    </p>
                    <p>
                        <b>Đơn Giá:</b> {{ number_format($nnhsanpham->nnhDonGia, 0, ',', '.') }} VND
                    </p>
                    <p>
                        <b>Mã Loại:</b> {{ $nnhsanpham->nnhMaloai }}
                    </p>
                    <p>
                        <b>Trạng Thái:</b> {{ $nnhsanpham->nnhTrangThai == 1 ? 'Hiển thị' : 'Khóa' }}
                    </p>
                @else
                    <p>Không tìm thấy thông tin sản phẩm.</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ url('/nnhAdminsp/nnh-san-pham') }}" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </section>
</body>
</html>