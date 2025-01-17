@extends('_layout.admins.nnh_master')
@section('title','Them moi admin')

@section('content-body')
    <div class="container">
        <div class="row ">
           <div class="col">
                <form action="{{route('admin-nnh.createsubmitQT')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm Mới Admin </h2>
                        </div>
                    </div>

                    <div class="card-body container-fruid">
                        <div class="mb-3 row">
                            <label for="id" class="col-sm-2 col-form-label">id: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id" name="id">
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhTaiKhoan" class="col-sm-2 col-form-label">Tài Khoản:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhTaiKhoan" name="nnhTaiKhoan">

                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhMatKhau" class="col-sm-2 col-form-label">Mật Khẩu:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhMatKhau" name="nnhMatKhau">
                            </div>
                          </div>

                          <div class="mb-3 row">
                            <label for="nnhTrangThai" class="col-sm-2 col-form-label">Trạng Thái:</label>
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
                        </div>
                        
                    </div>
                    <div class="card-footer">
                        <button  class="btn btn-success">Ghi Lại </button>
                        <a href="{{ route('admin-nnh.listqt') }}" class="btn btn-success">Quay lại</a>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection