<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\HinhThucNhap;

use Illuminate\Support\Str;

class HinhThucNhapController extends Controller
{
    public function getIndex()
    {
        $danhsach=HinhThucNhap::all();

    	return view('admin.hinhthucnhap.index',compact('danhsach'));
    }
    public function getCreate()
    {

    	return view('admin.HinhThucNhap.create');
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'tenhinhthuc'=>'required',

        ],[
            'tenhinhthuc.required'=>'Một số trường bất buộc phải nhập.',
            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $hinhthuc=new HinhThucNhap;
        $hinhthuc->tenhinhthucnhap=$req->tenhinhthuc;
        $hinhthuc->save();
    	return redirect('admin/hinhthucnhap/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $hinhthuc=HinhThucNhap::Find($id);
    	return view('admin/hinhthucnhap/edit',compact('hinhthuc'));
    }
    public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'tenhinhthuc'=>'required',

        ],[
            'tenhinhthuc.required'=>'Một số trường bất buộc phải nhập.',
            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $hinhthuc=HinhThucNhap::Find($id);
        $hinhthuc->tenhinhthucnhap=$req->tenhinhthuc;


        $hinhthuc->save();
        return redirect('admin/hinhthucnhap/index')->with('notification','Sửa thành công');
    }
    public function getDelete($id)
    {

            $hinhthuc=HinhThucNhap::Find($id);
            $hinhthuc->delete();
            return redirect('admin/hinhthucnhap/index')->with('notification','Đã xóa  thành công');

    }
}
