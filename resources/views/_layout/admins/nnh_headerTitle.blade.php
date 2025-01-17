<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    /* Cơ bản */
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa; /* Nền xám nhạt */
        color: #333333; /* Chữ màu tối */
    }

    /* Navbar */
    .navbar {
        background-color: #e3f2fd; /* Xanh nhạt */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
        padding: 10px 20px;
    }

    .navbar span {
        display: flex;
        align-items: center;
    }

    .navbar input[type="text"] {
        border: 1px solid #ced4da; /* Viền xám nhạt */
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 10px;
        margin-left: 10px;
    }

    /* Phần chứa chào mừng và các nút */
    .nnh-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
    }

    .nnhchaomung {
        font-weight: bold;
    }

    .nnhchaomung span {
        color: #d9534f; /* Đỏ nhạt */
        font-weight: bold;
    }

    .nnh-container .btn {
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-success {
        background-color: #28a745; /* Xanh lá */
        border-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838; /* Xanh lá đậm */
    }

    .btn-danger {
        background-color: #dc3545; /* Đỏ */
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333; /* Đỏ đậm */
    }

    .badge {
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
    }

    .badge.bg-info {
        background-color: #17a2b8; /* Xanh dương nhạt */
    }

    .badge.bg-warning {
        background-color: #ffc107; /* Vàng */
    }

    .badge:hover {
        filter: brightness(0.9);
    }

    /* Hiệu ứng hover */
    .btn:hover, .badge:hover {
        filter: brightness(0.9);
    }

    /* Main Content */
    main {
        padding: 20px;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light justify-content-between px-3">
        <span><i class="fa-solid fa-bars"></i> <input type="text"  placeholder="  Search" style="border-radius: 10px" style="border-color: brown"></span>
        
        <div>
            <div href="#" class="nnhchaomung" style="font-weight: bold">
                Chào mừng:<span style="color: red">
                    {{ session('nnhTaiKhoan') ?? 'Admind' }}
                </span>
            </div>     
            <a href="{{route('admin-nnh.loginsubmit')}}" class="btn btn-danger" style="font-weight: bold">Đăng xuất</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>