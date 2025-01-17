<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nnh_san_pham;
use App\Models\nnh_loai_san_pham;
use Illuminate\Support\Facades\Log; // Ghi log
use Illuminate\Support\Facades\File; // Xử lý file

class nnh_sp extends Controller
{
    // List sản phẩm
    public function nnhlistSP()
    {
        $nnhsanpham = nnh_san_pham::all();
        return view('nnhAdmins.nnhsanpham.nnh_list', ['nnhsanpham' => $nnhsanpham]);
    }

    // Form thêm mới sản phẩm
    public function nnhcreatesp()
    {
        $nnhloaisanpham = nnh_loai_san_pham::all();
        $availableImages = File::allFiles(public_path('images'));
        return view('nnhAdmins.nnhsanpham.nnh_create', ['nnhloaisanpham' => $nnhloaisanpham, 'availableImages' => $availableImages]);
    }

    // Xử lý thêm mới sản phẩm
    public function nnhcreatespsubmit(Request $request)
    {
        $request->validate([
            'nnhMaSanPham' => 'required|string|unique:_nnh__sanpham',
            'nnhTenSanPham' => 'required|string',
            'nnhHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'nnhSoLuong' => 'required|numeric',
            'nnhDonGia' => 'required|numeric',
            'nnhMaloai' => 'required',
            'nnhTrangThai' => 'required|boolean',
        ]);

        // Tìm ID loại sản phẩm từ mã loại
        $loaiSanPham = nnh_loai_san_pham::where('nnhMaloai', $request->nnhMaloai)->first();
        if (!$loaiSanPham) {
            return redirect()->back()->withErrors(['nnhMaloai' => 'Mã loại sản phẩm không hợp lệ.']);
        }

        $nnhsanpham = new nnh_san_pham();
        $nnhsanpham->nnhMaSanPham = $request->nnhMaSanPham;
        $nnhsanpham->nnhTenSanPham = $request->nnhTenSanPham;

        // Xử lý hình ảnh
        if ($request->hasFile('nnhHinhAnh')) {
            $nnhGetAnh = $request->file('nnhHinhAnh');
            $SaveAs = time() . '.' . $nnhGetAnh->getClientOriginalExtension(); // Tạo tên file duy nhất
            $nnhGetAnh->move(public_path('images'), $SaveAs); // Lưu hình ảnh vào thư mục public/images
            $nnhsanpham->nnhHinhAnh = $SaveAs; // Lưu tên file vào cơ sở dữ liệu
        } elseif ($request->nnhHinhAnhSelected) {
            $nnhsanpham->nnhHinhAnh = $request->nnhHinhAnhSelected; // Sử dụng ảnh đã chọn từ danh sách
        }

        $nnhsanpham->nnhSoLuong = $request->nnhSoLuong;
        $nnhsanpham->nnhDonGia = $request->nnhDonGia;
        $nnhsanpham->nnhMaloai = $loaiSanPham->id; // Lưu ID của loại sản phẩm
        $nnhsanpham->nnhTrangThai = $request->nnhTrangThai;
        $nnhsanpham->save();

        return redirect('/nnhAdmins/nnh-san-pham')->with('success', 'Thêm sản phẩm thành công!');
    }
    #chi tiết 
    public function nnhchitietsp($nnhID)
    {
        // Truy vấn dữ liệu từ bảng nnh_sanpham theo id
        $nnhsanpham = nnh_san_pham::find($nnhID);
    
        // Nếu không tìm thấy sản phẩm
        if (!$nnhsanpham) {
            return redirect()->route('nnhlist.sanpham')->with('error', 'Không tìm thấy sản phẩm.');
        }
        $nnhloaisanpham = nnh_loai_san_pham::all();
        // Trả về view với dữ liệu sản phẩm
        return view('nnhAdmins.nnhsanpham.nnh_chitiet', compact('nnhsanpham','nnhloaisanpham'));
    }
    #edit
    public function nnheditsp($nnhID)
        {
            // Truy vấn dữ liệu từ bảng nnh_sanpham theo id
            $nnhsanpham = nnh_san_pham::find($nnhID);

            // Nếu không tìm thấy sản phẩm
            if (!$nnhsanpham) {
                return redirect()->route('nnhlist.sanpham')->with('error', 'Không tìm thấy sản phẩm.');
            }

            // Lấy danh sách loại sản phẩm
            $nnhloaisanpham = nnh_loai_san_pham::all();

            // Trả về view với dữ liệu sản phẩm và loại sản phẩm
            return view('nnhAdmins.nnhsanpham.nnh_edit', compact('nnhsanpham', 'nnhloaisanpham'));
        }

        public function nnheditspsubmit(Request $request, $nnhID)
        {
            $request->validate([
                'nnhTenSanPham' => 'required|string',
                'nnhHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'nnhSoLuong' => 'required|numeric',
                'nnhDonGia' => 'required|numeric',
                'nnhMaloai' => 'required',
                'nnhTrangThai' => 'required|boolean',
            ]);
        
            // Lấy sản phẩm cần sửa
            $nnhsanpham = nnh_san_pham::find($nnhID);
            if (!$nnhsanpham) {
                return redirect()->route('nnhlist.sanpham')->with('error', 'Không tìm thấy sản phẩm.');
            }
        
            // Xử lý mã loại sản phẩm
            $loaiSanPham = nnh_loai_san_pham::where('nnhMaloai', $request->nnhMaloai)->first();
            if (!$loaiSanPham) {
                return redirect()->back()->withErrors(['nnhMaloai' => 'Mã loại sản phẩm không hợp lệ.']);
            }
        
            // Cập nhật thông tin sản phẩm
            $nnhsanpham->nnhTenSanPham = $request->nnhTenSanPham;
        
            // Xử lý hình ảnh
            if ($request->hasFile('nnhHinhAnh')) {
                // Nếu sản phẩm đã có ảnh cũ, xóa ảnh cũ
                if ($nnhsanpham->nnhHinhAnh && File::exists(public_path('images/' . $nnhsanpham->nnhHinhAnh))) {
                    File::delete(public_path('images/' . $nnhsanpham->nnhHinhAnh));
                }
        
                // Lưu ảnh mới
                $nnhGetAnh = $request->file('nnhHinhAnh');
                $SaveAs = time() . '.' . $nnhGetAnh->getClientOriginalExtension();
                $nnhGetAnh->move(public_path('images'), $SaveAs);  // Di chuyển hình ảnh vào thư mục public/images
                $nnhsanpham->nnhHinhAnh = $SaveAs;  // Lưu tên file ảnh mới vào database
            }
        
            // Cập nhật các thông tin khác
            $nnhsanpham->nnhSoLuong = $request->nnhSoLuong;
            $nnhsanpham->nnhDonGia = $request->nnhDonGia;
            $nnhsanpham->nnhMaloai = $loaiSanPham->id;
            $nnhsanpham->nnhTrangThai = $request->nnhTrangThai;
        
            // Lưu thay đổi
            $nnhsanpham->save();
        
            return redirect('/nnhAdmins/nnh-san-pham')->with('success', 'Cập nhật sản phẩm thành công!');
        }
        
        
    #delete
    public function nnhdeletesp($id){
        $nnhsanpham = nnh_san_pham::findOrFail($id);
        $nnhsanpham->delete();
        return redirect()->route('nnhlist.sanpham')->with('message', 'Loại sản phẩm đã được xoá thành công!');
    }
}
