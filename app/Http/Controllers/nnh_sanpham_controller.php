<?php

namespace App\Http\Controllers;
use App\Models\nnh_loai_san_pham;
use Illuminate\Http\Request;

class nnh_sanpham_controller extends Controller
{
    //list
    public function nnhlist(){
        $nnhloaisanpham = nnh_loai_san_pham::all();
        return view('nnhAdmins.nnhLoaiSanPham.nnh-list',['nnhloaisanpham'=> $nnhloaisanpham]);
    }

      //them mowi
      public function nnhcreate(){
        return view('nnhAdmins.nnhLoaiSanPham.nnh-create');
    }
    public function nnhcreatesubmit(Request $request){
        $request->validate([
            'nnhMaloai' => 'required|unique:_nnh__loaisanpham,nnhMaloai', // Đảm bảo duy nhất
            'nnhTenLoai' => 'required',
            'nnhTrangThai' => 'required|boolean',
        ]);
        
        $nnhloaisanpham = new nnh_loai_san_pham;
        $nnhloaisanpham->nnhMaloai = $request->nnhMaloai;
        $nnhloaisanpham->nnhTenLoai = $request->nnhTenLoai;
        $nnhloaisanpham->nnhTrangThai = $request->nnhTrangThai;
        $nnhloaisanpham->save();
    
        return redirect()->route('admin-nnh.list');
    }
    public function nnhchitiet($id)
        {
            // Tìm bản ghi theo id
            $nnhloaisanpham = nnh_loai_san_pham::find($id);
        
            // Kiểm tra nếu không tìm thấy bản ghi
            if (!$nnhloaisanpham) {
                return redirect('/nnhLoaiSanPham/nnh-loai-san-pham')->with('error', 'Không tìm thấy thông tin sản phẩm.');
            }
        
            // Trả về view với dữ liệu
            return view('nnhAdmins.nnhLoaiSanPham.nnh-chitiet', ['nnhloaisanpham' => $nnhloaisanpham]);
        }
        
    
    #edit
    public function nnhedit($id){
        $nnhloaisanpham = nnh_loai_san_pham::find($id);
        
        // Kiểm tra xem có tìm thấy dữ liệu không
        if (!$nnhloaisanpham) {
            return redirect('/nnhAdmins/nnhLoaiSanPham')->with('error', 'Loại sản phẩm không tồn tại');
        }
        
        return view('nnhAdmins.nnhLoaiSanPham.nnh-edit', ['nnhloaisanpham' => $nnhloaisanpham]);
    }

    #edit submit
    public function nnheditsubmit(Request $request)
    {
        $nnhMaloai  = $request->nnhMaloai ;
        $nnhloaisanpham = nnh_loai_san_pham::where('nnhMaloai',$nnhMaloai)->first();
        $nnhloaisanpham->nnhMaloai=$request->nnhMaloai;
        $nnhloaisanpham->nnhTenLoai=$request->nnhTenLoai;
        $nnhloaisanpham->nnhTrangThai=$request->nnhTrangThai;
        // ...
        $nnhloaisanpham->save(); // Ghi lại
        return redirect('/nnhAdmins/nnh-loai-san-pham');
    }
    
    #delete
    public function nnhdeletesp($id)
    {
        $nnhloaisanpham = nnh_loai_san_pham::findOrFail($id);
        $nnhloaisanpham->delete();
        
        return redirect('/nnhAdmins/nnh-loai-san-pham');
    }
}

