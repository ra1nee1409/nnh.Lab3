@extends('_layout.admins.nnh_master')
@section('title','Them moi san Pham')

@section('content-body')
    <div class="container">
        <div class="row">
           <div class="col">
                <form action="{{route('nnh.createspsubmit')}}" method="post" >
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Thêm Mới Sản Phẩm </h2>
                        </div>
                    </div>

                    <div class="card-body container-fruid">
                        <div class="mb-1 row">
                            <label for="nnhMaSanPham" class="col-sm-1 col-form-label" style="font-weight: bold">Mã SP:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhMaSanPham" name="nnhMaSanPham" value="{{old('nnhMaSanPham')}}">
                                @error('nnhMaSanPham')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>

                        <div class="mb-1 row">
                            <label for="nnhTenSanPham" class="col-sm-1 col-form-label" style="font-weight: bold">Tên SP:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nnhTenSanPham" name="nnhTenSanPham" value="{{old('nnhTenSanPham')}}">
                                @error('nnhTenSanPham')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        
                          <div class="mb-1 row">
                            <label for="nnhHinhAnh" class="col-sm-1 col-form-label" style="font-weight: bold">Hình SP:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="nnhHinhAnh" name="nnhHinhAnh" onchange="previewImage(event)">
                                @error('nnhHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <select name="nnhHinhAnhSelected" class="form-control mt-2">
                                    <option value=""> Chọn ảnh có sẵn </option>
                                    @foreach ($availableImages as $file)
                                        <option value="{{ $file->getFilename() }}">{{ $file->getFilename() }}</option>
                                    @endforeach
                                </select>
                              
                            </div>
                            
                        <div class="mb-1 row">
                            <label for="nnhSoLuong " class="col-sm-1 col-form-label" style="font-weight: bold">Số Lượng:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nnhSoLuong" name="nnhSoLuong" value="{{old('nnhSoLuong')}}">
                                @error('nnhSoLuong')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>

                        <div class="mb-1 row">
                            <label for="nnhDonGia " class="col-sm-1 col-form-label" style="font-weight: bold">Đơn Giá:</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nnhDonGia" name="nnhDonGia" value="{{old('nnhDonGia')}}">
                                @error('nnhDonGia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        <div class="mb-1 row">
                            <label for="nnhMaloai" class="col-sm-1 col-form-label" style="font-weight: bold" >Mã Loại:</label>
                            <div class="col-sm-10">
                              <select name="nnhMaloai" id="nnhMaloai" class="form-control" >
                                @foreach ( $nnhloaisanpham as $item)
                                    <option value="{{$item->nnhMaloai}}">{{$item->nnhTenLoai}}</option>
                                @endforeach
                              </select>
                                @error('nnhMaloai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                          </div>
                        
                          <div class="mb-1 row">
                            <label for="nnhTrangThai" class="col-sm-1 col-form-label" style="font-weight: bold">Trạng Thái:</label>
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
                    <div class="card-footer" style="margin-top: -10px; ">
                        <button  class="btn btn-success" >Ghi Lại </button>
                        <a href="{{route('nnhlist.sanpham')}}" class="btn btn-success">Quạy lại</a>
                    </div>
                </form>
           </div>
        </div>
    </div>
@endsection