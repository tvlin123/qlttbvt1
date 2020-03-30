<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\SanPham;
use App\DanhMucSP;

use Illuminate\Support\Str;

class SanPhamController extends Controller
{
    public function getIndex()
    {
        $danhsach=SanPham::all();

    	return view('admin.sanpham.index',compact('danhsach'));
    }
    public function getCreate()
    {
        $danhsachdanhmuc=DanhMucSP::all();

    	return view('admin.sanpham.create',compact('danhsachdanhmuc'));
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'tensanpham'=>'required',
            'thongso'=>'required',
            'soluong'=>'required',
            'frk_gianhap'=>'required',
            'frk_giaxuat'=>'required',

        ],[
            'tensanpham.required'=>'Một số trường bất buộc phải nhập.',
            'thongso.required'=>'Một số trường bất buộc phải nhập.',
            'soluong.required'=>'Một số trường bất buộc phải nhập.',
            'frk_gianhap.required'=>'Một số trường bất buộc phải nhập.',
            'frk_giaxuat.required'=>'Một số trường bất buộc phải nhập.',
            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $sanpham =new SanPham;
        $sanpham->id_danhmuc=$req->id_danhmuc;
        $sanpham->tensanpham=$req->tensanpham;
        $sanpham->thongso=$req->thongso;
        $sanpham->mota=$req->mota;
        $sanpham->soluong=$req->soluong;
        $sanpham->frk_gianhap=$req->frk_gianhap;
        $sanpham->frk_giaxuat=$req->frk_giaxuat;
        $sanpham->hinhanh=$req->hinhanh;
        $sanpham->save();
    	return redirect('admin/sanpham/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $danhsachdanhmuc=DanhMucSP::all();
        $sanpham =SanPham::Find($id);
    	return view('admin/sanpham/edit',compact('sanpham','danhsachdanhmuc'));
    }
    public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'tensanpham'=>'required',
            'thongso'=>'required',
            'soluong'=>'required',
            'frk_gianhap'=>'required',
            'frk_giaxuat'=>'required',

        ],[
            'tensanpham.required'=>'Một số trường bất buộc phải nhập.',
            'thongso.required'=>'Một số trường bất buộc phải nhập.',
            'soluong.required'=>'Một số trường bất buộc phải nhập.',
            'frk_gianhap.required'=>'Một số trường bất buộc phải nhập.',
            'frk_giaxuat.required'=>'Một số trường bất buộc phải nhập.',
            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $sanpham =SanPham::Find($id);
        $sanpham->id_danhmuc=$req->id_danhmuc;
        $sanpham->tensanpham=$req->tensanpham;
        $sanpham->thongso=$req->thongso;
        $sanpham->mota=$req->mota;
        $sanpham->soluong=$req->soluong;
        $sanpham->frk_gianhap=$req->frk_gianhap;
        $sanpham->frk_giaxuat=$req->frk_giaxuat;
        $sanpham->hinhanh=$req->hinhanh;
        $sanpham->save();
        return redirect('admin/sanpham/index')->with('notification','Sửa thành công');
    }
    public function getDelete($id)
    {

            $sanpham =SanPham::Find($id);
            $sanpham ->delete();
            return redirect('admin/sanpham/index')->with('notification','Đã xóa  thành công');

    }
}
