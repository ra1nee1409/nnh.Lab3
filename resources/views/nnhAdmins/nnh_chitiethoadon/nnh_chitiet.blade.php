<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi Tiết Hóa Đơn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <section class="container my-3">
        <div class="card">
            <div class="card-header">
                <h3>Thông Tin Chi Tiết Hóa Đơn</h3>
            </div>
            <div class="card-body">
                @if ($nnhCTHoaDon)
                    <p class="card-text">
                        <b>ID Hóa Đơn:</b> {{$nnhCTHoaDon->nnhHoaDonID }}
                    </p>
                    <p>
                        <b>ID Sản Phẩm:</b> {{$nnhCTHoaDon->nnhSanPhamID }}
                    </p>
                    <p>
                        <b>Số Lượng Mua:</b> {{$nnhCTHoaDon->nnhSoLuongMua }}
                    </p>
                    <p>
                        <b>Đơn Giá Mua:</b> {{$nnhCTHoaDon->nnhDonGiaMua }}
                    </p>
                    <p>
                        <b>Thành Tiền:</b> {{$nnhCTHoaDon->nnhThanhTien }}
                    </p>
                    <p>
                        <b>Trạng Thái:</b> 
                        @if ($nnhCTHoaDon->nnhnnhTrangThai == 1)
                            Hoạt động
                        @else
                            Không hoạt động
                        @endif
                    </p>
                @else
                    <p>Không tìm thấy thông tin hóa đơn.</p>
                @endif
            </div>
            <div class="card-footer">
                <a href="/nnhAdmins/nnhcthoadon" class="btn btn-primary">Quay lại</a>
            </div>
        </div>
    </section>
</body>
</html>
