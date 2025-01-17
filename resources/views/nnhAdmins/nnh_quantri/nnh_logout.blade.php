@extends('_layout.admins.nnh_master')
@section('title','Home')
<head>
    <style>
        h1{
            border-radius: 5px;
            text-align: center;
            /* font-weight: bold; ko hoạt động */
            background: url('{{ asset('/images/tải xuống (2).jpg') }}') no-repeat center center/cover;
            padding: 50px;
            font-size: 36px;
            
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
@section('content')
<div class="container mt-4">
    <h1 class="animate__animated animate__fadeIn animate__bounce animate__zoomIn" style="color: aliceblue" > 
            <i class="fa-solid fa-circle-user"></i> Chào Mừng Đến Với Trang Chủ
    </h1>
    <hr>
    <div class="mt-3">
        <p>
            Bạn có 
            <span class="badge bg-info" >{{ $messages_count }}</span> 
            tin nhắn mới.
        </p>
        <p>
            Bạn có 
            <span class="badge bg-warning text-dark">{{ $notifications_count }}</span> 
            thông báo.
        </p>
    </div>
</div>
@endsection