<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log; // Thêm use cho Log
use App\Models\nnh_chitiethoadon_model;
use App\Models\nnh_hoa_don_model;
use App\Models\nnh_san_pham;

use Illuminate\Http\Request;

class nnh_chitiethoadon extends Controller
{
    public function nnhlistCTHD()
    { //paginate(5)
        $nnhctHoaDon = nnh_chitiethoadon_model::all();
        return view('nnhAdmins.nnh_chitiethoadon.nnh_list', ['nnhctHoaDon' => $nnhctHoaDon]);
    }
    #insert
    public function nnhcreatecthd()
    {
        // Lấy danh sách Hoa Don va San Pham để chọn
        $nnhHoaDon = nnh_hoa_don_model::all();
        $nnhSanPham = nnh_san_pham::all();

        return view('nnhAdmins.nnh_chitiethoadon.nnh_create',
        [
            'nnhHoaDon' => $nnhHoaDon,
            'nnhSanPham' => $nnhSanPham
        ]);
    }
    #insert submit
    public function nnhcreatecthdsubmit(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nnhHoaDonID' => 'required|exists:_nnh_hoadon,id',
            'nnhSanPhamID' => 'required|exists:_nnh__sanpham,id',
            'nnhSoLuongMua' => 'required|integer|min:1',
            'nnhDonGiaMua' => 'required|numeric|min:0',
            'nnhThanhTien' => 'nullable|numeric|min:0',
            'nnhTrangThai' => 'required|boolean',
        ]);
    
        // Tính toán thành tiền nếu chưa có
        $nnhThanhTien = $request->nnhThanhTien ?? ($request->nnhSoLuongMua * $request->nnhDonGiaMua);
    
        // Lưu dữ liệu
        nnh_chitiethoadon_model::create([
            'nnhHoaDonID' => $request->nnhHoaDonID,
            'nnhSanPhamID' => $request->nnhSanPhamID,
            'nnhSoLuongMua' => $request->nnhSoLuongMua,
            'nnhDonGiaMua' => $request->nnhDonGiaMua,
            'nnhThanhTien' => $nnhThanhTien,
            'nnhTrangThai' => $request->nnhTrangThai,
        ]);
    
        // Chuyển hướng sau khi lưu thành công
        return redirect()->route('nnh.listCTHD')->with('success', 'Thêm hóa đơn thành công!');
    }
    

    #chi tiết
    public function nnhchitietcthd($id)
    {
        // Truy vấn dữ liệu từ bảng nnh_HoaDon theo id
        $nnhCTHoaDon = nnh_chitiethoadon_model::find($id);

        // Nếu không tìm thấy Hoa Don
        if (!$nnhCTHoaDon) {
            return redirect()->route('nnh.listCTHD')->with('error', 'Không tìm thấy Hoa Don.');
        }

        // Lấy danh sách loại ID Hoa Don
        $nnhIDHoaDon = nnh_hoa_don_model::all();
        // Lấy danh sách loại ID San Pham
        $nnhIDSanPham = nnh_san_pham::all();

        // Trả về view với dữ liệu Hoa Don và loại Hoa Don
        return view('nnhAdmins.nnh_chitiethoadon.nnh_chitiet', compact('nnhCTHoaDon', 'nnhIDHoaDon','nnhIDSanPham'));
    }

    #edit
    public function nnheditcthd($id)
    {
        // Truy vấn dữ liệu từ bảng nnh_HoaDon theo id
        $nnhCTHoaDon = nnh_chitiethoadon_model::find($id);

        // Nếu không tìm thấy Hoa Don
        if (!$nnhCTHoaDon) {
            return redirect()->route('nnh.listCTHD')->with('error', 'Không tìm thấy Hoa Don.');
        }

        // Lấy danh sách loại ID Hoa Don
        $nnhIDHoaDon = nnh_hoa_don_model::all();
        // Lấy danh sách loại ID San Pham
        $nnhIDSanPham = nnh_san_pham::all();

        // Trả về view với dữ liệu Hoa Don và loại Hoa Don
        return view('nnhAdmins.nnh_chitiethoadon.nnh_edit', compact('nnhCTHoaDon', 'nnhIDHoaDon','nnhIDSanPham'));
    }
    public function nnheditCTHDsubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'nnhHoaDonID' => 'required|exists:_nnh_hoadon,id',
            'nnhSanPhamID' => 'required|exists:_nnh__sanpham,id',
            'nnhSoLuongMua' => 'required|integer|min:1',
            'nnhDonGiaMua' => 'required|numeric|min:0|max:9999999999.99',
            'nnhThanhTien' => 'nullable|numeric|min:0|max:9999999999.99',
            'nnhTrangThai' => 'required|boolean',
        ]);
    
        // Tìm chi tiết hóa đơn theo ID
        $nnhCTHoaDon = nnh_chitiehoadon::find($id);
    
        // Kiểm tra nếu không tìm thấy
        if (!$nnhCTHoaDon) {
            return redirect()->route('nnh.listCTHD')->with('error', 'Không tìm thấy chi tiết hóa đơn.');
        }
    
        // Cập nhật dữ liệu
        $nnhCTHoaDon->nnhHoaDonID = $request->nnhHoaDonID;
        $nnhCTHoaDon->nnhSanPhamID = $request->nnhSanPhamID;
        $nnhCTHoaDon->nnhSoLuongMua = $request->nnhSoLuongMua;
        $nnhCTHoaDon->nnhDonGiaMua = $request->nnhDonGiaMua;
        $nnhCTHoaDon->nnhThanhTien = $request->nnhThanhTien ?? $nnhCTHoaDon->nnhSoLuongMua * $nnhCTHoaDon->nnhDonGiaMua;
        $nnhCTHoaDon->nnhTrangThai = $request->nnhTrangThai;
    
        // Lưu vào cơ sở dữ liệu
        $nnhCTHoaDon->save();
    
        return redirect()->route('nnh.listCTHD')->with('success', 'Cập nhật chi tiết hóa đơn thành công!');
    }
     #delete
     public function nnhCTHDdelete($id){
        $nnhCTHoaDon = nnh_chitiethoadon_model::findOrFail($id);
        $nnhCTHoaDon->delete();
        return redirect()->route('nnh.listCTHD')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }
}
