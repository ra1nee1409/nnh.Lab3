<?php
namespace App\Http\Controllers;

use App\Models\nnh_khach_hang_model; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class nnh_khach_hang_controller extends Controller
{
    // List sản phẩm
    public function nnhlistKH()
    {
        $nnhkhachhang = nnh_khach_hang_model::all();
        return view('nnhAdmins.nnh_khachhang.nnhlist', ['nnhkhachhang' => $nnhkhachhang]);
    }
    //them mowi
    public function nnhcreateKH(){
        return view('nnhAdmins.nnh_khachhang.nnhcreate');
    }
    public function nnhcreateKHsubmit(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'nnhMakhachhang' => 'required|unique:_nnh__khachhang,nnhMakhachhang|max:255',
            'nnhHotenkhachhang' => 'required|max:255',
            'nnhEmail' => 'required|email|unique:_nnh__khachhang,nnhEmail|max:255',
            'nnhDienThoai' => 'required|unique:_nnh__khachhang,nnhDienThoai|max:255',
            'nnhDiaChi' => 'required|max:255',
            'nnhNgayDK' => 'required|date',
            'nnhTrangThai' => 'required|boolean',
        ]);
    
        // Tạo một đối tượng mới của model
        $khachHang = new nnh_khach_hang_model();
        $khachHang->nnhMakhachhang = $request->nnhMakhachhang;
        $khachHang->nnhHotenkhachhang = $request->nnhHotenkhachhang;
        $khachHang->nnhEmail = $request->nnhEmail;
        $khachHang->nnhDienThoai = $request->nnhDienThoai;
        $khachHang->nnhDiaChi = $request->nnhDiaChi;
        $khachHang->nnhNgayDK = $request->nnhNgayDK;
        $khachHang->nnhTrangThai = $request->nnhTrangThai;
    
        // Lưu dữ liệu vào bảng
        $khachHang->save();
    
        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('nnh.listkhachhang')->with('success', 'Khách hàng được tạo thành công!');
    }
     #chi tiết
     public function nnhchitietkh($id)
     {
         // Tìm bản ghi theo id
         $khachHang = nnh_khach_hang_model::find($id);
     
         // Kiểm tra nếu không tìm thấy bản ghi
         if (!$khachHang) {
             return redirect('/nnhAdmins/nnhkhachhang')->with('error', 'Không tìm thấy thông tin sản phẩm.');
         }
     
         // Trả về view với dữ liệu
         return view('nnhAdmins.nnh_khachhang.nnhchitiet', ['khachHang' => $khachHang]);
     }

#edit
    public function nnheditKH($id)
    {
        $khachHang = nnh_khach_hang_model::find($id);
    
        if (!$khachHang) {
            return redirect()->route('nnh.listkhachhang')->with('error', 'Khách hàng không tồn tại.');
        }
    
        return view('nnhAdmins.nnh_khachhang.nnhedit', compact('khachHang'));
    }
#edit submit
    public function nnheditsubmit(Request $request, $id)
    {
        $request->validate([
            'nnhHotenkhachhang' => 'required|string|max:255',
            'nnhEmail' => 'required|email|max:255',
            'nnhDienThoai' => 'required|string|max:255',
            'nnhDiaChi' => 'required|string|max:255',
            'nnhNgayDK' => 'required|date',
            'nnhTrangThai' => 'required|boolean',
        ]);

        $khachHang = nnh_khach_hang_model::find($id);

        if (!$khachHang) {
            return redirect()->route('nnh.listkhachhang')->with('error', 'Khách hàng không tồn tại.');
        }

        $khachHang->nnhHotenkhachhang = $request->nnhHotenkhachhang;
        $khachHang->nnhEmail = $request->nnhEmail;
        $khachHang->nnhDienThoai = $request->nnhDienThoai;
        $khachHang->nnhDiaChi = $request->nnhDiaChi;
        $khachHang->nnhNgayDK = $request->nnhNgayDK;
        $khachHang->nnhTrangThai = $request->nnhTrangThai;

        $khachHang->save();

        return redirect()->route('nnh.listkhachhang')->with('success', 'Khách hàng đã được cập nhật thành công.');
    }
    #delete
    public function nnhKHdelete($id){
        $khachHang = nnh_khach_hang_model::findOrFail($id);
        $khachHang->delete();
        return redirect()->route('nnh.listkhachhang')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }
}
