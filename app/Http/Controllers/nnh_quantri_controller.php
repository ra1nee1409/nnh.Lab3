<?php

namespace App\Http\Controllers;
use App\Models\nnh_quan_tri; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class nnh_quantri_controller extends Controller
{
    public function nnhLogin(){
        return view('nnhAdmins.nnh_quantri.nnh_login');
    }

    public function nnhLoginsubmit(Request $request) {
        // Validation form
        $validationData = $request->validate([
            'nnhTaiKhoan' => 'required|string',
            'nnhMatKhau' => 'required|min:6|max:12'
        ]);
        // Lấy giá trị từ form
        $email = $request->input('nnhTaiKhoan');
        $password = $request->input('nnhMatKhau');
        // Kiểm tra tài khoản
        $user = nnh_quan_tri::where('nnhTaiKhoan', $email)->first();
        if (!$user) {
            return back()->withErrors(['nnhTaiKhoan' => 'Tài khoản không tồn tại.']);
        }
        // Kiểm tra mật khẩu (nếu chưa mã hóa)
        if ($user->nnhMatKhau !== $password) {
            return back()->withErrors(['nnhMatKhau' => 'Mật khẩu không đúng.']);
        }
        // Lưu thông tin tài khoản vào session
        session(['nnhTaiKhoan' => $user->nnhTaiKhoan]);
        // Đăng nhập thành công, chuyển hướng
        return redirect('/nnhAdmins/nnh-loai-san-pham');
    }

    public function nnhlogout()
    {
        $messages_count = 3; // Số tin nhắn
        $notifications_count = 15; // Số thông báo
        return view('nnhlogin.nnhhome-logout', [
            'messages_count' => $messages_count,
            'notifications_count' => $notifications_count
        ]);
    }

    public function nnhlistQT()
    {   
        $nnhquantri =  nnh_quan_tri::all();
        return view('nnhAdmins.nnh_quantri.nnh_list',['nnhquantri' => $nnhquantri]);
    }

    public function nnhcreateQT(){
        return view('/nnhAdmins/nnh_quantri/nnh_create');
    }

    public function nnhcreateQTsubmit(Request $request){
        $request->validate([
            'id' => 'required|unique:nnh_quantri,id', // Đảm bảo duy nhất
            'nnhTaiKhoan' => 'required|unique:nnh_quantri,nnhTaiKhoan', // Đảm bảo duy nhất
            'nnhMatKhau' => 'required',
            'nnhTrangThai' => 'required|boolean',
        ]);
        
        $nnhquantri = new nnh_quan_tri;
        $nnhquantri->id = $request->id;
        $nnhquantri->nnhTaiKhoan = $request->nnhTaiKhoan;
        $nnhquantri->nnhMatKhau = $request->nnhMatKhau;
        $nnhquantri->nnhTrangThai = $request->nnhTrangThai;
        
        $nnhquantri->save();
    
        // Redirect tới danh sách admin sau khi lưu thành công
        return redirect()->route('admin-nnh.list');
    }
    
    public function nnhchitietqt($id)
    {
        // Tìm bản ghi theo id
        $nnhquantri = nnh_quan_tri::find($id);
    
        // Kiểm tra nếu không tìm thấy bản ghi
        if (!$nnhquantri) {
            return redirect('nnh-admins-listQT')->with('error', 'Không tìm thấy thông tin sản phẩm.');
        }
    
        // Trả về view với dữ liệu
        return view('nnhAdmins.nnh_quantri.nnh_chitiet', ['nnhquantri' => $nnhquantri]);
    }

    #edit
    public function nnheditQT($id){
        $nnhquantri = nnh_quan_tri::find($id);
        
        // Kiểm tra xem có tìm thấy dữ liệu không
        if (!$nnhquantri) {
            return redirect('/nnhAdmins/nnh_quantri')->with('error', 'Loại sản phẩm không tồn tại');
        }
        
        return view('nnhAdmins.nnh_quantri.nnh_edit', ['nnhquantri' => $nnhquantri]);
    }

    public function nnheditsubmitQT(Request $request, $id)
    {
        // Lấy tài khoản từ request
        $nnhTaiKhoan = $request->input('nnhTaiKhoan');
        
        // Tìm bản ghi theo id
        $nnhquantri = nnh_quan_tri::find($id);
    
        // Kiểm tra nếu không tìm thấy bản ghi
        if (!$nnhquantri) {
            return redirect('/nnhAdmins/nnh_quantri/nnh_list')
                ->with('error', 'Không tìm thấy thông tin quản trị.');
        }
    
        // Kiểm tra nếu tài khoản không khớp với tài khoản từ form
        if ($nnhquantri->nnhTaiKhoan !== $nnhTaiKhoan) {
            return redirect('/nnhAdmins/nnh_quantri/nnh_list')
                ->with('error', 'Tài khoản không hợp lệ.');
        }
    
        // Cập nhật dữ liệu từ request
        $nnhquantri->nnhMatKhau = $request->input('nnhMatKhau');
        $nnhquantri->nnhTrangThai = $request->input('nnhTrangThai');
    
        // Lưu lại vào cơ sở dữ liệu
        $nnhquantri->save();
    
        // Chuyển hướng với thông báo thành công
        return redirect('/nnhAdmins/nnh_quantri/nnh_list')
            ->with('success', 'Cập nhật thông tin quản trị thành công.');
    }
    
    #delete
    public function nnhdeleteQT($id)
    {
        $nnhquantri = nnh_quan_tri::findOrFail($id);
        $nnhquantri->delete();
        return redirect('/nnhAdmins/nnh_quantri/nnh_list');
    }
}
?>