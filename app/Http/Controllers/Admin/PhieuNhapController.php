<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\PhieuNhap;
use App\HinhThucNhap;
use App\Users;
use App\SanPham;
use App\CTPhieuNhap;
use DB;
use Illuminate\Support\Str;

class PhieuNhapController extends Controller
{
    public function getIndex()
    {
        $danhsach=PhieuNhap::all();

    	return view('admin.phieunhap.index',compact('danhsach'));
    }
    public function getCreate()
    {
        $danhsachhinhthucnhap=HinhThucNhap::all();
        $danhsachnguoidung=Users::all();
        $danhsachsanpham=SanPham::all();

    	return view('admin.phieunhap.create',compact('danhsachhinhthucnhap','danhsachnguoidung','danhsachsanpham'));
    }

    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'lydonhap'=>'required',

        ],[
            'lydonhap.required'=>'Một số trường bất buộc phải nhập.',


        ]);
        $thanhtien=0;
        $phieunhap =new PhieuNhap;
        $phieunhap->id_hinhthucnhap =$req->id_hinhthucnhap ;
        $phieunhap->lydonhap =$req->lydonhap;
        $phieunhap->ngaynhap =$req->ngaynhap;
        $phieunhap->id_nguoinhap=$req->id_nguoinhap;
       /* $phieunhap->pn_tongtien=$req->pn_tongtien ;*/
        $phieunhap->nhaptu=$req->nhaptu;
        $phieunhap->diachi  =$req->diachi  ;
        $phieunhap->sdt =$req->sdt ;
        $phieunhap->save();
        foreach ($req->sanpham as $key => $value) {
            $sanpham=SanPham::Find($key);
            $ctphieunhap=new CTPhieuNhap;
            $ctphieunhap->id_sanpham=$key;
            $ctphieunhap->id_phieunhap=$phieunhap->id;
            $ctphieunhap->soluong=$req->soluong[$key];
            $ctphieunhap->thanhtien=$req->soluong[$key]*$sanpham->frk_gianhap;
            $ctphieunhap->gianhap=$sanpham->frk_gianhap;
            $ctphieunhap->save();

            $sanpham->soluong=$sanpham->soluong + $req->soluong[$key];
            $sanpham->save();

            $thanhtien=$thanhtien+($req->soluong[$key]*$sanpham->frk_gianhap);
        }
        $phieunhap_edit=PhieuNhap::Find($phieunhap->id);
        $phieunhap_edit->tongtien=$thanhtien;
        $phieunhap_edit->save();


    	return redirect('admin/phieunhap/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $danhsachhinhthucnhap=HinhThucNhap::all();
        $danhsachnguoidung=Users::all();
        $phieunhap =PhieuNhap::Find($id);
        $danhsachsanpham=SanPham::select(DB::raw('sanpham.*,(select sum(pn.soluong) from ct_phieunhap pn where pn.id_sanpham=sanpham.id and pn.id_phieunhap='.$id.' ) as soluong'))->get();

       $danhsachchitietphieunhap=CTPhieuNhap::where('id_phieunhap','=',$id)->select(DB::raw('id'))->groupby('id')->get();
    	return view('admin/phieunhap/edit',compact('phieunhap','danhsachhinhthucnhap','danhsachnguoidung','danhsachsanpham'));
    }
    public function postEdit(Request $req,$id)
    {
      /* $this->validate($req,
        [
            'lydonhap '=>'required',

        ],[
            'lydonhap .required'=>'Một số trường bất buộc phải nhập.',


        ]);*/
        $thanhtien=0;
        $danhsachchitietphieunhap=CTPhieuNhap::where('id_phieunhap','=',$id)->get();
        foreach ($danhsachchitietphieunhap as $value) {
           $ctphieunhap=CTPhieuNhap::Find($value->id);
           $ctphieunhap->delete();
        }
         foreach ($req->sanpham as $key => $value) {
            $sanpham=SanPham::Find($key);
            $ctphieunhap=new CTPhieuNhap;
            $ctphieunhap->id_sanpham=$key;
            $ctphieunhap->id_phieunhap=$id;
            $ctphieunhap->soluong=$req->soluong[$key];
            $ctphieunhap->thanhtien=$req->soluong[$key]*$sanpham->frk_gianhap;
            $ctphieunhap->gianhap=$sanpham->frk_gianhap;
            $ctphieunhap->save();

            $sanpham->soluong=$sanpham->soluong - $req->soluong[$key];
            $sanpham->save();

            $thanhtien=$thanhtien+$req->soluong[$key]*$sanpham->frk_gianhap;
        }

        $phieunhap =PhieuNhap::Find($id);
        $phieunhap->id_hinhthucnhap =$req->id_hinhthucnhap ;
        $phieunhap->lydonhap =$req->lydonhap ;
        $phieunhap->ngaynhap =$req->ngaynhap ;
        $phieunhap->id_nguoinhap=$req->id_nguoinhap;
        $phieunhap->tongtien=$thanhtien ;
        $phieunhap->diachi  =$req->diachi  ;
        $phieunhap->sdt =$req->sdt ;
        $phieunhap->save();
        return redirect('admin/phieunhap/index')->with('notification','Thêm thành công');
    }
    public function getDelete($id)
    {
        $danhsachchitietphieunhap=CTPhieuNhap::where('id_phieunhap','=',$id)->get();
         foreach ($danhsachchitietphieunhap as $value) {
           $ctphieunhap=CTPhieuNhap::Find($value->id);
           $ctphieunhap->delete();
        }
        $phieunhap =PhieuNhap::Find($id);
        $phieunhap ->delete();
        return redirect('admin/phieunhap/index')->with('notification','Đã xóa  thành công');

    }
}
