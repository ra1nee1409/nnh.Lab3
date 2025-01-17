<style>
  body, html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa; /* Nền tổng thể xám nhạt */
  }

  .container-fluid {
      display: flex;
      height: 100vh; /* Full màn hình */
  }

  .sideBar {
      width: 265px;
      height: 100%; /* Chiều cao toàn màn hình */
      background: #d0ebd9; /* Xanh lá nhạt */
      color: #4a4a4a; /* Màu chữ xám đậm */
      padding: 15px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
      transition: all 0.3s ease; /* Hiệu ứng chuyển động */
  }

  .sideBar ul {
      list-style: none;
      padding: 0;
      margin: 0;
  }

  .sideBar ul li {
      margin-bottom: 15px;
      transition: transform 0.3s ease; /* Hiệu ứng khi hover */
  }

  .sideBar ul li:hover {
      transform: translateX(5px); /* Di chuyển nhẹ sang phải */
  }

  .sideBar ul li a {
      text-decoration: none;
      color: #4a4a4a; /* Màu chữ tối */
      background: #cce5ff; /* Xanh lam nhạt */
      font-weight: bold;
      padding: 10px;
      display: block;
      border-radius: 8px;
      transition: all 0.3s ease; /* Hiệu ứng chuyển động */
  }

  .sideBar ul li a:hover {
      background: #dbe7f5; /* Xanh lam nhạt hơn khi hover */
      color: #ffffff; /* Chữ trắng khi hover */
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.15); /* Đổ bóng khi hover */
  }

  .Wrapper {
      flex-grow: 1;
      background: #f8f9fa; /* Nền tổng thể xám nhạt */
      padding: 15px;
      overflow-y: auto;
  }

  header {
      padding: 10px 15px;
      background: #f0f4ef; /* Kem xanh nhạt */
      color: #4a4a4a; /* Màu chữ tối */
      font-size: 1.2rem;
      font-weight: bold;
      text-align: center;
      border-radius: 8px;
      margin-bottom: 15px;
      transition: background 0.3s ease; /* Hiệu ứng khi hover */
  }

  header:hover {
      background: #e3f2fd; /* Xanh lam nhạt khi hover */
  }

  .content-body {
      background: #ffffff; /* Nền trắng */
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
      animation: fadeIn 0.5s ease; /* Hiệu ứng xuất hiện */
  }

  @keyframes fadeIn {
      from {
          opacity: 0;
      }
      to {
          opacity: 1;
      }
  }

  /* Nút bấm */
  .btn {
      background: #ffeeba; /* Vàng nhạt */
      color: #4a4a4a; /* Chữ xám đậm */
      font-weight: bold;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: all 0.3s ease;
  }

  .btn:hover {
      background: #d0ebd9; /* Xanh lá nhạt khi hover */
      color: #ffffff; /* Chữ trắng */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); /* Đổ bóng khi hover */
  }
</style>

  <!-- Menu -->
  <ul class="list-group">   
    <li class="list-group-item">
      <a href="/nnhAdmins/nnh_quantri/nnh_list">Danh Sách Admins</a>
    </li>
  
    <!-- Liên kết tới trang quản lý loại sản phẩm -->
    <li class="list-group-item">
      <a href="/nnhAdmins/nnh-loai-san-pham">Dạnh Sách Loại Sản Phẩm</a>
    </li>
    
    <li class="list-group-item">
      <a href="/nnhAdmins/nnh-san-pham">Dạnh Sách Sản Phẩm</a>
    </li>
  
    <li class="list-group-item">
      <a href="/nnhAdmins/nnhkhachhang">Khách Hàng</a>
    </li>
    
    <li class="list-group-item">
      <a href="/nnhAdmins/nnhhoadon">Hoá Đơn</a>
    </li>
    
    <li class="list-group-item">
      <a href="/nnhAdmins/nnhcthoadon"> Chi Tiết Hoá Đơn</a>
    </li>    
  </ul>