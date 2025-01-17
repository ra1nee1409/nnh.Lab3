@extends('_layout.admins.nnh_master')
@section('title','Them moi Loai san Pham')

@section('content-body')
    <div class="container">
        <div class="row ">
           <div class="col">
                <form action="{{route('nnh.createKH.createsubmit')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm Mới Loại Sản Phẩm </h2>
                        </div>
                    </div>

                    <div class="card-body container-fruid">
                        <div class="mb-3 row">
                            <label for="nnhMakhachhang" class="col-sm-2 col-form-label" style="font-weight: bold">Mã Khách Hàng:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhMakhachhang" name="nnhMakhachhang" value="{{old('nnhMakhachhang')}}">
                                @error('nnhMakhachhang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhHotenkhachhang" class="col-sm-2 col-form-label" style="font-weight: bold">Tên Khách Hàng:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhHotenkhachhang" name="nnhHotenkhachhang" value="{{old('nnhHotenkhachhang')}}">
                                @error('nnhHotenkhachhang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhEmail" class="col-sm-2 col-form-label" style="font-weight: bold">Emaill:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="nnhEmail" name="nnhEmail" value="{{old('nnhEmail')}}">
                                @error('nnhEmail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhDienThoai" class="col-sm-2 col-form-label" style="font-weight: bold">Điện Thoại:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhDienThoai" name="nnhDienThoai" value="{{old('nnhDienThoai')}}">
                                @error('nnhDienThoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhDiaChi" class="col-sm-2 col-form-label" style="font-weight: bold">Địa Chỉ:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhDiaChi" name="nnhDiaChi" value="{{old('nnhDiaChi')}}">
                                @error('nnhDiaChi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhNgayDK" class="col-sm-2 col-form-label" style="font-weight: bold">Ngày Đăng Kí:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="nnhNgayDK" name="nnhNgayDK" value="{{old('nnhNgayDK')}}">
                                @error('nnhNgayDK')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="nnhTrangThai" class="col-sm-2 col-form-label" style="font-weight: bold">Trạng Thái:</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        id="nnhTrangThai1" 
                                        name="nnhTrangThai" 
                                        value="1" 
                                        checked 
                                    />
                                    <label for="nnhTrangThai1" class="form-check-label">Hiển Thị</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        class="form-check-input" 
                                        id="nnhTrangThai0" 
                                        name="nnhTrangThai" 
                                        value="0" 
                                    />
                                    <label for="nnhTrangThai0" class="form-check-label">Khóa</label>
                                </div>
                            </div>
                            @error('nnhTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button  class="btn btn-success">Ghi Lại </button>
                        <a href="{{route('admin-nnh.list')}}" class="btn btn-success">Quạy lại</a>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection