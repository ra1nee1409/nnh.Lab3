<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nnh_sanpham_controller;
use App\Http\Controllers\nnh_quantri_controller;
use App\Http\Controllers\nnh_khach_hang_controller;
use App\Http\Controllers\nnh_sp;
use App\Http\Controllers\nnh_hoa_don_controller;
use App\Http\Controllers\nnh_chitiethoadon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#--------------------------------------------------------------------------------------------------------------------------------------------------

#list
Route::get('/nnhAdmins/nnh-loai-san-pham',[nnh_sanpham_controller::class,'nnhlist'])->name('admin-nnh.list');
#insert
Route::get('/nnhAdmins/nnh-loai-san-pham/nnh-create',[nnh_sanpham_controller::class,'nnhcreate'])->name('admin-nnh.create');
#insert submit
Route::post('/nnhAdmins/nnh-loai-san-pham/nnh-create',[nnh_sanpham_controller::class,'nnhcreatesubmit'])->name('admin-nnh.createsubmit');
#chi tiet
route::get('/nnhAdmins/nnh-loai-san-pham/nnh-chitiet/{id}',[nnh_sanpham_controller::class,'nnhchitiet'])->name('admin-nnh.chitiet');
#edit
route::get('/nnhAdmins/nnh-loai-san-pham/nnh-edit/{id}',[nnh_sanpham_controller::class,'nnhedit'])->name('admin-nnh.edit');
route::post('/nnhAdmins/nnh-loai-san-pham/nnh-edit/{id}',[nnh_sanpham_controller::class,'nnheditsubmit'])->name('admin-nnh.editsubmit');
#delete
route::get('/nnhAdmins/nnh-loai-san-pham/nnh-delete/{id}',[nnh_sanpham_controller::class,'nnhdeletesp'])->name('admin-nnh.deletesp');

#--------------------------------------------------------------------------------------------------------------------------------------------------


#quan tri
#login
Route::get('/nnhAdmins/nnh_quantri/nnh_login', [nnh_quantri_controller::class, 'nnhLogin'])->name('admin-nnh.login');
Route::post('/nnhAdmins/nnh_quantri/nnh_login', [nnh_quantri_controller::class, 'nnhLoginsubmit'])->name('admin-nnh.loginsubmit');
#home-logout
Route::get('/home', [nnh_quantri_controller::class, 'nnhlogout'])->name('home');
// Định nghĩa route cho danh sách admin
Route::get('/nnhAdmins/nnh_quantri/nnh_list', [nnh_quantri_controller::class, 'nnhlistQT'])->name('admin-nnh.listqt');
// Định nghĩa route cho form thêm mới admin
Route::get('/nnhAdmins/nnh_quantri/nnh_create', [nnh_quantri_controller::class, 'nnhcreateQT'])->name('admin-nnh.createQT');
// Định nghĩa route để submit form thêm mới admin
Route::post('/nnhAdmins/nnh_quantri/nnh_create', [nnh_quantri_controller::class, 'nnhcreateQTsubmit'])->name('admin-nnh.createsubmitQT');
// Định nghĩa route để xem chi tiết admin
Route::get('/nnhAdmins/nnh_quantri/nnh_chitiet/{id}', [nnh_quantri_controller::class, 'nnhchitietqt'])->name('admin-nnh.chitietqt');
// Định nghĩa route để sửa admin
route::get('/nnhAdmins/nnh_quantri/nnh_edit/{id}',[nnh_quantri_controller::class, 'nnheditQT'])->name('admin-nnh.editqt');
route::post('/nnhAdmins/nnh_quantri/nnh_edit/{id}',[nnh_quantri_controller::class, 'nnheditsubmitQT'])->name('admin-nnh.editsubmitqt');
#delete
route::get('/nnhAdmins/nnh_quantri/nnh-deleteQT/{id}',[nnh_quantri_controller::class,'nnhdeleteQT'])->name('admin-nnh.deleteqt');

#--------------------------------------------------------------------------------------------------------------------------------------------------

#Sản Phẩm
#tim kiếm
// Route::get('/nnhAdmins/nnhsanpham/timkiem', [nnh_sp::class, 'search'])->name('productTypes.timkiem');
#List sản phẩm
Route::get('/nnhAdmins/nnh-san-pham', [nnh_sp::class,'nnhlistSP'])->name('nnhlist.sanpham');
#thêm mới sản phẩm
Route::get('/nnhAdmins/nnh-san-pham/nnh-create', [nnh_sp::class, 'nnhcreatesp'])->name('nnh.createsp');
#insert submit
Route::post('/nnhAdmins/nnh-san-pham/nnh-create', [nnh_sp::class, 'nnhcreatespsubmit'])->name('nnh.createspsubmit');
#chi tiết sản phẩm
Route::get('/nnhAdmins/nnh-san-pham/chitietsp/{nnhID}', [nnh_sp::class, 'nnhchitietsp'])->name('nnh.chitietsp');
// Route hiển thị form sửa sản phẩm
Route::get('nnhAdmins/nnh-san-pham/nnh-edit/{nnhID}', [nnh_sp::class, 'nnheditsp'])->name('nnh.editsanpham');

// Route xử lý cập nhật sản phẩm
Route::post('nnhAdmins/nnh-san-pham/nnh-edit/{nnhID}', [nnh_sp::class, 'nnheditspsubmit'])->name('nnh.editsanphamsubmit');

#xóa sản phẩm
Route::get('/nnhAdmins/nnh-san-pham/nnh-delete/{id}', [nnh_sp::class, 'nnhdeletesp'])->name('admin-nnh.deletesp');

#--------------------------------------------------------------------------------------------------------------------------------------------------

#Khách Hàng   
Route::get('/nnhAdmins/nnhkhachhang',[nnh_khach_hang_controller::class, 'nnhlistKH'])->name('nnh.listkhachhang');
#create khach hang
Route::get('/nnhAdmins/nnhkhachhang/createkhachHang',[nnh_khach_hang_controller::class,'nnhcreateKH'])->name('nnh.craeteKHcreate');
#create submit
Route::post('/nnhAdmins/nnhkhachhang/createkhachHang',[nnh_khach_hang_controller::class,'nnhcreateKHsubmit'])->name('nnh.createKH.createsubmit');
#chi tiệt
Route::get('/nnhAdmins/nnhkhachhang/chitiet/{id}',[nnh_khach_hang_controller::class,'nnhchitietkh'])->name('nnh.chitietkh');
#edit
Route::get('/nnhAdmins/nnhkhachhang/editkhachHang/{id}', [nnh_khach_hang_controller::class, 'nnheditKH'])->name('nnh.editKH');
#edit submit
Route::post('/nnhAdmins/nnhkhachhang/editkhachHang/{id}', [nnh_khach_hang_controller::class, 'nnheditsubmit'])->name('nnh.editKHsubmit');
#delete
Route::get('/nnhAdmins/nnhkhachhang/deletekhachhang/{id}',[nnh_khach_hang_controller::class,'nnhKHdelete'])->name('nnh.deleteKH');

#--------------------------------------------------------------------------------------------------------------------------------------------------

#Hóa Đơn 
Route::get('/nnhAdmins/nnhhoadon',[nnh_hoa_don_controller::class,'nnhlistHD'])->name('nnh.listHD');
#create 
Route::get('/nnhAdmins/nnhhoadon/nnh-craeteHD',[nnh_hoa_don_controller::class,'nnhcreatehd'])->name('nnh.createHD');
#create submit
Route::post('/nnhAdmins/nnhhoadon/nnh-craeteHD',[nnh_hoa_don_controller::class,'nnhcreatehdsubmit'])->name('nnh.createsubmitHD');
#chi tiết hóa đơn
Route::get('/nnhAdmins/nnhhoadon/chitiet/{id}', [nnh_hoa_don_controller::class,'nnhchitiethd'])->name('nnh.chitietHD');
#edit
Route::get('/nnhAdmins/nnhhoadon/nnh_editHD/{id}', [nnh_hoa_don_controller::class, 'nnhedithd'])->name('nnh.editHD');
#edit submit
Route::post('/nnhAdmins/nnhhoadon/nnh_editHD/{id}', [nnh_hoa_don_controller::class, 'nnheditHDsubmit'])->name('nnh.editHDsubmit');
#delete hoa đơn
Route::get('/nnhAdmins/nnhhoadon/nnh-deleteHD/{id}',[nnh_hoa_don_controller::class,'nnhHDdelete'])->name('nnh.deleteHd');

#--------------------------------------------------------------------------------------------------------------------------------------------------

# list
Route::get('/nnhAdmins/nnhcthoadon',[nnh_chitiethoadon::class,'nnhlistCTHD'])->name('nnh.listCTHD');
# thêm mới
Route::get('/nnhAdmins/nnhcthoadon/Create-CTHD',[nnh_chitiethoadon::class,'nnhcreatecthd'])->name('nnh.createCTHD');
# thêm mới submit
Route::post('/nnhAdmins/nnhcthoadon/Create-CTHD',[nnh_chitiethoadon::class,'nnhcreatecthdsubmit'])->name('nnh.createsubmitCTHD');
# chi tiết
Route::get('/nnhAdmins/nnhcthoadon/ChiTiet-CTHD/{id}', [nnh_chitiethoadon::class, 'nnhchitietcthd'])->name('nnh.chitietCTHD');
# edit
Route::get('/nnhAdmins/nnhcthoadon/Edit-CTHD/{id}', [nnh_chitiethoadon::class, 'nnheditcthd'])->name('nnh.editCTHD');
# edit submit
Route::post('/nnhAdmins/nnhcthoadon/Edit-CTHD/{id}', [nnh_chitiethoadon::class, 'nnheditCTHDsubmit'])->name('nnh.editsubmitCTHD');
# delete
Route::get('/nnhAdmins/nnhcthoadon/delete-CTHD/{id}', [nnh_chitiethoadon::class, 'nnhCTHDdelete'])->name('nnh.deleteCTHD');

#--------------------------------------------------------------------------------------------------------------------------------------------------
