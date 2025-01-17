@extends('_layout.admins.nnh_master')
@section('title','Them moi Loai san Pham')

@section('content-body')
    <div class="container">
        <div class="row">
           <div class="col">
                <form action="{{route('admin-nnh.createsubmit')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm Mới Loại Sản Phẩm </h2>
                        </div>
                    </div>
                    <div class="card-body container-fruid">
                        <div class="mb-3 row">
                            <label for="nnhMaloai" class="col-sm-2 col-form-label" style="font-weight: bold">Mã Loại:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhMaloai" name="nnhMaloai" value="{{old('nnhMaloai')}}">
                                @error('nnhMaloai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-3 row">
                            <label for="nnhTenLoai" class="col-sm-2 col-form-label" style="font-weight: bold">Tên Loại:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhTenLoai" name="nnhTenLoai" value="{{old('nnhTenLoai')}}">
                                @error('nnhTenLoai')
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