<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nnh_hoa_don_model;
use App\Models\nnh_khach_hang_model;
class nnh_hoa_don_controller extends Controller
{
    public function nnhlistHD()
    {
        $nnhHoaDon = nnh_hoa_don_model::paginate(5);
        return view('nnhAdmins.nnh_hoadon.nnh_list', ['nnhHoaDon' => $nnhHoaDon]);
    }
    #insert
    public function nnhcreatehd()
    {
        // Lấy danh sách khách hàng để chọn
        $nnhkhachhang = nnh_khach_hang_model::all();
        return view('nnhAdmins.nnh_hoadon.nnh_create', ['nnhkhachhang' => $nnhkhachhang]);
    }

    #insert submit
    public function nnhcreatehdsubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nnhMakhachhang' => 'required|exists:_nnh__khachhang,id',
            'nnhMaHoaDon' => 'required|string|unique:_nnh_hoadon,nnhMaHoaDon',
            'nnhNgayHoaDon' => 'required|date',
            'nnhHotenKhachHang' => 'required|string|max:255',
            'nnhEmail' => 'nullable|email|max:255',
            'nnhDienThoai' => 'nullable|string|max:255',
            'nnhDiaChi' => 'nullable|string|max:255',
            'nnhTongGiaTri' => 'required|numeric|min:0',
            'nnhTrangThai' => 'required|boolean',
        ]);
    
        // Giới hạn giá trị nnhTongGiaTri (ví dụ giới hạn tối đa là 99999999999999.99)
        $maxTongGiaTri = 99999999999999.99;  // Giới hạn giá trị tối đa
        $nnhTongGiaTri = min($request->nnhTongGiaTri, $maxTongGiaTri);  // Giới hạn giá trị nếu vượt quá
    
        // Tạo hóa đơn mới
        $hoaDon = new nnh_hoa_don_model();
        $hoaDon->nnhMaHoaDon = $request->nnhMaHoaDon;
        $hoaDon->nnhMakhachhang = $request->nnhMakhachhang;
        $hoaDon->nnhNgayHoaDon = $request->nnhNgayHoaDon;
        $hoaDon->nnhHotenKhachHang = $request->nnhHotenKhachHang;
        $hoaDon->nnhEmail = $request->nnhEmail;
        $hoaDon->nnhDienThoai = $request->nnhDienThoai;
        $hoaDon->nnhDiaChi = $request->nnhDiaChi;
        $hoaDon->nnhTongGiaTri = $nnhTongGiaTri;  // Lưu giá trị đã được giới hạn
        $hoaDon->nnhTrangThai = $request->nnhTrangThai;
    
        // Lưu vào cơ sở dữ liệu
        $hoaDon->save();
    
        return redirect()->route('nnh.listHD')->with('success', 'Thêm hóa đơn thành công!');
    }
    #chi tiết
            public function nnhchitiethd($id)
            {
                // Truy vấn dữ liệu từ bảng nnh_HoaDon theo id
                $nnhHoaDon = nnh_hoa_don_model::find($id);

                // Nếu không tìm thấy Hoa Don
                if (!$nnhHoaDon) {
                    return redirect()->route('nnh.listHD')->with('error', 'Không tìm thấy Hoa Don.');
                }

                // Lấy danh sách loại Hoa Don
                $nnhloaikhachhang = nnh_khach_hang_model::all();

                // Trả về view với dữ liệu Hoa Don và loại Hoa Don
                return view('nnhAdmins.nnh_hoadon.nnh_chitiet', compact('nnhHoaDon', 'nnhloaikhachhang'));
            }
    #edit
    public function nnhedithd($id)
    {
        // Truy vấn dữ liệu từ bảng nnh_HoaDon theo id
        $nnhHoaDon = nnh_hoa_don_model::find($id);

        // Nếu không tìm thấy Hoa Don
        if (!$nnhHoaDon) {
            return redirect()->route('nnh.listHD')->with('error', 'Không tìm thấy Hoa Don.');
        }

        // Lấy danh sách loại Hoa Don
        $nnhloaikhachhang = nnh_khach_hang_model::all();

        // Trả về view với dữ liệu Hoa Don và loại Hoa Don
        return view('nnhAdmins.nnh_hoadon.nnh_edit', compact('nnhHoaDon', 'nnhloaikhachhang'));
    }
    public function nnheditHDsubmit(Request $request, $id)
    {
    // Xác thực dữ liệu
    $request->validate([
        'nnhMakhachhang' => 'required|exists:_nnh__khachhang,id',
        'nnhMaHoaDon' => "required|string|unique:_nnh_hoadon,nnhMaHoaDon,{$id}",
        'nnhNgayHoaDon' => 'required|date',
        'nnhHotenKhachHang' => 'required|string|max:255',
        'nnhEmail' => 'nullable|email|max:255',
        'nnhDienThoai' => 'nullable|string|max:255',
        'nnhDiaChi' => 'nullable|string|max:255',
        'nnhTongGiaTri' => 'required|numeric|min:0',
        'nnhTrangThai' => 'required|boolean',
    ]);

    // Tìm hóa đơn theo ID
    $nnhHoaDon = nnh_hoa_don_model::find($id);

    // Kiểm tra nếu không tìm thấy
    if (!$nnhHoaDon) {
        return redirect()->route('nnh.listHD')->with('error', 'Không tìm thấy hóa đơn.');
    }

    // Giới hạn giá trị nnhTongGiaTri
    $maxTongGiaTri = 9999999999.99; // Giới hạn giá trị tối đa
    $nnhTongGiaTri = min($request->nnhTongGiaTri, $maxTongGiaTri);

    // Cập nhật dữ liệu
    $nnhHoaDon->nnhMaHoaDon = $request->nnhMaHoaDon;
    $nnhHoaDon->nnhMakhachhang = $request->nnhMakhachhang;
    $nnhHoaDon->nnhNgayHoaDon = $request->nnhNgayHoaDon;
    $nnhHoaDon->nnhHotenKhachHang = $request->nnhHotenKhachHang;
    $nnhHoaDon->nnhEmail = $request->nnhEmail;
    $nnhHoaDon->nnhDienThoai = $request->nnhDienThoai;
    $nnhHoaDon->nnhDiaChi = $request->nnhDiaChi;
    $nnhHoaDon->nnhTongGiaTri = $nnhTongGiaTri; // Gán giá trị đã được giới hạn
    $nnhHoaDon->nnhTrangThai = $request->nnhTrangThai;

    // Lưu vào cơ sở dữ liệu
    $nnhHoaDon->save();

    return redirect()->route('nnh.listHD')->with('success', 'Cập nhật hóa đơn thành công!');
    }
     #delete
     public function nnhHDdelete($id){
        $nnhHoaDon = nnh_hoa_don_model::findOrFail($id);
        $nnhHoaDon->delete();
        return redirect()->route('nnh.listHD')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }
}
