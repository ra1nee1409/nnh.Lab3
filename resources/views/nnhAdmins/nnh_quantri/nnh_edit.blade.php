<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Sửa Admin</title>
</head>
<body>
    <section class="container">
        <form action="{{ route('admin-nnh.editsubmitqt', ['id' => $nnhquantri->id]) }}" method="POST">
            @csrf
            @method('POST')  <!-- Cần dùng @method('POST') nếu phương thức là POST -->
            <div class="card">
                <div class="card-header">
                    <h3>Thông tin quản trị cập nhật</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nnhTaiKhoan" class="col-sm-2 col-form-label">
                            Tài khoản
                        </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control" id="nnhTaiKhoan" name="nnhTaiKhoan" value="{{ $nnhquantri->nnhTaiKhoan }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhMatKhau" class="col-sm-2 col-form-label">
                            Mật khẩu
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nnhMatKhau" name="nnhMatKhau" value="{{ old('nnhMatKhau', $nnhquantri->nnhMatKhau) }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nnhTrangThai" class="col-sm-2 col-form-label">
                            Trạng Thái
                        </label>
                        <div class="col-sm-10">
                            <div>
                                <input type="radio" id="nnhTrangThai1" name="nnhTrangThai" value="0" {{ old('nnhTrangThai', $nnhquantri->nnhTrangThai) == 0 ? 'checked' : '' }}>
                                <label for="nnhTrangThai1">Không hoạt động</label>
                            </div>
                            <div>
                                <input type="radio" id="nnhTrangThai2" name="nnhTrangThai" value="1" {{ old('nnhTrangThai', $nnhquantri->nnhTrangThai) == 1 ? 'checked' : '' }}>
                                <label for="nnhTrangThai2">Hoạt động</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mx-2">Cập nhật</button>
                    <a href="{{ url('/nnhAdmins/nnh_quantri/nnh_list') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
        </form>
    </section>
</body>
</html>