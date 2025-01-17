<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Toàn bộ màn hình */
        body {
            background: url('{{ asset('/images/background.avif') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Container chính */
        .container {
            background: url('{{ asset('/images/hinh4.jpg') }}') no-repeat center center/cover;
            max-width: 500px;
            width: 100%;
            padding: 50px;
            background-color: white; /* Màu trắng làm nền */
            border-radius: 15px; /* Bo góc */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Đổ bóng mềm */
        }

        /* Tiêu đề */
        .container h2 {
            font-weight: bold;
            font-size: 24px;
            color: #cb1111; /* Màu tím gradient */
            margin-bottom: 10px;
        }

        .container p {
            font-weight: bold;
            font-size: 14px;
            color: #ff4d4f; /* Màu đỏ nổi bật */
            margin-bottom: 20px;
        }

        /* Icon */
        .icon {
            color: #cb1111;
            margin-right: 10px;
        }

        /* Input và Label */
        .form-group {
            position: relative;
        }
        
        .form-group i {
            position: absolute;
            top: 63%;
            left: 10px;
            transform: translateY(-50%);
            color: #cb1111;
        }

        .form-group label {
            color: #000000;
        }

        /* CSS cho input */
        .form-control {
            padding-left: 30px; /* Chừa khoảng trống cho icon */
            height: 45px; /* Đảm bảo chiều cao input đủ để chứa text và icon */
            line-height: normal;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #cb1111;
            box-shadow: 0 0 5px rgba(203, 17, 17, 0.5);
        }

        /* Nút đăng nhập */
        .btn-primary {
            background-color: #cb1111;
            border: none;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            background-color: #2575fc; /* Màu xanh lam nhạt khi hover */
            transform: scale(1.02); /* Hiệu ứng phóng to nhẹ */
        }

        .btn-primary i {
            margin-right: 10px;
        }

        /* Hiển thị lỗi */
        .text-danger {
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h2><i class="fas fa-user-lock icon"></i><br>Login Admin</h2>
            <p>Đăng Nhập Bằng Tài Khoản Quản Trị!</p>
        </div>

        <form action="{{route('admin-nnh.loginsubmit')}}" method="post">
            @csrf
            <!-- Tên tài khoản -->
            <div class="form-group mb-3">
                <label for="nnhTaiKhoan" style="font-weight: bold;">Tài khoản:</label>
                <input type="text" name="nnhTaiKhoan" id="nnhTaiKhoan" placeholder="Nhập tài khoản của bạn" class="form-control">
                <i class="fas fa-user"></i>
                @error('nnhTaiKhoan')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>

            <!-- Mật khẩu -->
            <div class="form-group mb-3">
                <label for="nnhMatKhau" style="font-weight: bold;">Mật khẩu:</label>
                <input type="password" name="nnhMatKhau" id="nnhMatKhau" placeholder="Nhập mật khẩu" class="form-control">
                <i class="fas fa-lock"></i>
                @error('nnhMatKhau')
                    <span class="text-danger"> {{$message}} </span>
                @enderror
            </div>

            <!-- Nút gửi -->
            <button type="submit" class="btn btn-primary mt-3 w-100" style="font-weight: bold;">
                <i class="fas fa-sign-in-alt"></i>Đăng nhập
            </button>
        </form>
    </div>
</body>
</html>
