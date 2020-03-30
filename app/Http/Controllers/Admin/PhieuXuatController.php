<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\PhieuXuat;
use App\HinhThucXuat;
use App\Users;

use Illuminate\Support\Str;

class PhieuXuatController extends Controller
{
    public function getIndex()
    {
        $danhsach=PhieuXuat::all();

    	return view('admin.phieuxuat.index',compact('danhsach'));
    }
    public function getCreate()
    {
        $danhsachhinhthucxuat=HinhThucXuat::all();
        $danhsachnguoidung=Users::all();

    	return view('admin.phieuxuat.create',compact('danhsachhinhthucxuat','danhsachnguoidung'));
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'lydoxuat '=>'required',

        ],[
            'lydoxuat .required'=>'Một số trường bất buộc phải nhập.',


        ]);
        $phieuxuat =new PhieuXuat;
        $phieuxuat->id_hinhthucxuat =$req->id_hinhthucxuat ;
        $phieuxuat->lydoxuat =$req->lydoxuat ;
        $phieuxuat->ngayxuat =$req->ngayxuat ;
        $phieuxuat->id_nguoixuat=$req->id_nguoixuat;
        $phieuxuat->px_tongtien=$req->px_tongtien ;
        $phieuxuat->diachi  =$req->diachi  ;
        $phieuxuat->sdt =$req->sdt ;

        $phieuxuat->save();
    	return redirect('admin/phieuxuat/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $danhsachhinhthucxuat=HinhThucXuat::all();
        $danhsachnguoidung=Users::all();
        $phieuxuat =PhieuXuat::Find($id);
    	return view('admin/phieuxuat/edit',compact('phieuxuat','danhsachhinhthucxuat','danhsachnguoidung'));
    }
    public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'lydoxuat '=>'required',

        ],[
            'lydoxuat .required'=>'Một số trường bất buộc phải nhập.',


        ]);
        $phieuxuat =PhieuXuat::Find($id);
        $phieuxuat->id_hinhthucxuat =$req->id_hinhthucxuat ;
        $phieuxuat->lydoxuat =$req->lydoxuat ;
        $phieuxuat->ngayxuat =$req->ngayxuat ;
        $phieuxuat->id_nguoixuat=$req->id_nguoixuat;
        $phieuxuat->px_tongtien=$req->px_tongtien ;
        $phieuxuat->diachi  =$req->diachi  ;
        $phieuxuat->sdt =$req->sdt ;
        $phieuxuat->save();
        return redirect('admin/phieuxuat/index')->with('notification','Sửa thành công');
    }
    public function getDelete($id)
    {

            $phieuxuat =PhieuXuat::Find($id);
            $phieuxuat ->delete();
            return redirect('admin/phieuxuat/index')->with('notification','Đã xóa  thành công');

    }
}
