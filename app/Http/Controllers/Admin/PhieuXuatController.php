<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\PhieuXuat;
use App\HinhThucXuat;
use App\Users;
use App\SanPham;
use App\CTPhieuXuat;
use DB;
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
        $danhsachsanpham=SanPham::all();

    	return view('admin.phieuxuat.create',compact('danhsachhinhthucxuat','danhsachnguoidung','danhsachsanpham'));
    }

    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'lydoxuat'=>'required',

        ],[
            'lydoxuat.required'=>'Một số trường bất buộc phải nhập.',


        ]);
        $thanhtien=0;
        $phieuxuat =new PhieuXuat;
        $phieuxuat->id_hinhthucxuat =$req->id_hinhthucxuat ;
        $phieuxuat->lydoxuat =$req->lydoxuat;
        $phieuxuat->ngayxuat =$req->ngayxuat;
        $phieuxuat->id_nguoixuat=$req->id_nguoixuat;
       /* $phieuxuat->px_tongtien=$req->px_tongtien ;*/
        $phieuxuat->xuatcho=$req->xuatcho;
        $phieuxuat->diachi  =$req->diachi  ;
        $phieuxuat->sdt =$req->sdt ;
        $phieuxuat->save();
        foreach ($req->sanpham as $key => $value) {
            $sanpham=SanPham::Find($key);
            $ctphieuxuat=new CTPhieuXuat;
            $ctphieuxuat->id_sanpham=$key;
            $ctphieuxuat->id_phieuxuat=$phieuxuat->id;
            $ctphieuxuat->soluong=$req->soluong[$key];
            $ctphieuxuat->thanhtien=$req->soluong[$key]*$sanpham->frk_gianhap;
            $ctphieuxuat->gianhap=$sanpham->frk_gianhap;
            $ctphieuxuat->save();

            $sanpham->soluong=$sanpham->soluong - $req->soluong[$key];
            $sanpham->save();

            $thanhtien=$thanhtien+$req->soluong[$key]*$sanpham->frk_gianhap;
        }
        $phieuxuat_edit=PhieuXuat::Find($phieuxuat->id);
        $phieuxuat_edit->px_tongtien=$thanhtien;
        $phieuxuat_edit->save();


    	return redirect('admin/phieuxuat/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $danhsachhinhthucxuat=HinhThucXuat::all();
        $danhsachnguoidung=Users::all();
        $phieuxuat =PhieuXuat::Find($id);
        $danhsachsanpham=SanPham::select(DB::raw('sanpham.*,(select sum(px.soluong) from ct_phieuxuat px where px.id_sanpham=sanpham.id and px.id_phieuxuat='.$id.' ) as soluong'))->get();
       $danhsachchitietphieuxuat=CTPhieuXuat::where('id_phieuxuat','=',$id)->select(DB::raw('id'))->groupby('id')->get();
    	return view('admin/phieuxuat/edit',compact('phieuxuat','danhsachhinhthucxuat','danhsachnguoidung','danhsachsanpham'));
    }
    public function postEdit(Request $req,$id)
    {
      /* $this->validate($req,
        [
            'lydoxuat '=>'required',

        ],[
            'lydoxuat .required'=>'Một số trường bất buộc phải nhập.',


        ]);*/
        $thanhtien=0;
        $danhsachchitietphieuxuat=CTPhieuXuat::where('id_phieuxuat','=',$id)->get();
        foreach ($danhsachchitietphieuxuat as $value) {
           $ctphieuxuat=CTPhieuXuat::Find($value->id);
           $ctphieuxuat->delete();
        }
         foreach ($req->sanpham as $key => $value) {
            $sanpham=SanPham::Find($key);
            $ctphieuxuat=new CTPhieuXuat;
            $ctphieuxuat->id_sanpham=$key;
            $ctphieuxuat->id_phieuxuat=$id;
            $ctphieuxuat->soluong=$req->soluong[$key];
            $ctphieuxuat->thanhtien=$req->soluong[$key]*$sanpham->frk_gianhap;
            $ctphieuxuat->gianhap=$sanpham->frk_gianhap;
            $ctphieuxuat->save();

            $sanpham->soluong=$sanpham->soluong - $req->soluong[$key];
            $sanpham->save();

            $thanhtien=$thanhtien+$req->soluong[$key]*$sanpham->frk_gianhap;
        }

        $phieuxuat =PhieuXuat::Find($id);
        $phieuxuat->id_hinhthucxuat =$req->id_hinhthucxuat ;
        $phieuxuat->lydoxuat =$req->lydoxuat ;
        $phieuxuat->ngayxuat =$req->ngayxuat ;
        $phieuxuat->id_nguoixuat=$req->id_nguoixuat;
        $phieuxuat->px_tongtien=$thanhtien ;
        $phieuxuat->diachi  =$req->diachi  ;
        $phieuxuat->sdt =$req->sdt ;
        $phieuxuat->save();
        return redirect('admin/phieuxuat/index')->with('notification','Thêm thành công');
    }
    public function getDelete($id)
    {
        $danhsachchitietphieuxuat=CTPhieuXuat::where('id_phieuxuat','=',$id)->get();
         foreach ($danhsachchitietphieuxuat as $value) {
           $ctphieuxuat=CTPhieuXuat::Find($value->id);
           $ctphieuxuat->delete();
        }
        $phieuxuat =PhieuXuat::Find($id);
        $phieuxuat ->delete();
        return redirect('admin/phieuxuat/index')->with('notification','Đã xóa  thành công');

    }
}
