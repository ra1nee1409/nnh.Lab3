<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif; /* Font thân thiện và dễ đọc */
            background: #f4f5f7; /* Màu nền tổng thể nhẹ */
        }
    
        .container-fluid {
            display: flex;
            height: 100vh; /* Đảm bảo chiều cao toàn màn hình */
        }
    
        .sideBar {
            width: 265px;
            height: 100%; /* Đảm bảo sidebar full chiều cao màn hình */
            background: #344955; /* Màu tối hiện đại */
            color: #ffffff; /* Font chữ màu trắng */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Phân chia nội dung đều */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
            padding: 15px;
        }
    
        .sideBar ul {
            list-style: none;
            padding: 0;
        }
    
        .sideBar ul li {
            margin-bottom: 15px;
        }
    
        .sideBar ul li a {
            text-decoration: none;
            color: #f9aa33; /* Màu vàng cam nổi bật */
            font-weight: bold;
            padding: 10px;
            display: block;
            border-radius: 5px;
            transition: background 0.3s ease, color 0.3s ease;
        }
    
        .sideBar ul li a:hover {
            background: #f9aa33; /* Nền vàng cam */
            color: #344955; /* Chữ chuyển sang màu tối khi hover */
        }
    
        .Wrapper {
            flex-grow: 1;
            background: #ffffff; /* Nền trắng sáng */
            padding: 15px;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
        }
    
        header {
            padding: 10px 15px;
            background: #4a6572; /* Màu xám xanh hiện đại */
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    
        .content-body {
            background: #f4f5f7; /* Nền xám nhạt */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    
        /* Nút bấm */
        .btn {
            background: #f9aa33;
            color: #ffffff;
            font-weight: bold;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
    
        .btn:hover {
            background: #344955; /* Màu chuyển sang tối khi hover */
        }
    </style>
    
    
</head>
<body style="background:#ccc">
    <section class="container-fluid d-flex p-0"> <!-- bỏ margin (p-0) -->
        <nav class="sideBar">
            @include('_layout.admins.nnh_menu')
        </nav>
        <section class="Wrapper">
            <header class="my-1">
              @include ('_layout.admins.nnh_headerTitle')
            </header>
            <section class="content-body my-1 p-1">
                @yield('content-body')
            </section>
        </section>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>