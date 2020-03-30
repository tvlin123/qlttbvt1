<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\HinhThucXuat;

use Illuminate\Support\Str;

class HinhThucXuatController extends Controller
{
    public function getIndex()
    {
        $danhsach=HinhThucXuat::all();

    	return view('admin.hinhthucxuat.index',compact('danhsach'));
    }
    public function getCreate()
    {

    	return view('admin.hinhthucxuat.create');
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
        $hinhthuc=new HinhThucXuat;
        $hinhthuc->tenhinhthucxuat=$req->tenhinhthuc;
        $hinhthuc->save();
    	return redirect('admin/hinhthucxuat/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $hinhthuc=HinhThucXuat::Find($id);
    	return view('admin/hinhthucxuat/edit',compact('hinhthuc'));
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
        $hinhthuc=HinhThucXuat::Find($id);
        $hinhthuc->tenhinhthucxuat=$req->tenhinhthuc;


        $hinhthuc->save();
        return redirect('admin/hinhthucxuat/index')->with('notification','Sửa thành công');
    }
    public function getDelete($id)
    {

            $hinhthuc=HinhThucXuat::Find($id);
            $hinhthuc->delete();
            return redirect('admin/hinhthucxuat/index')->with('notification','Đã xóa  thành công');

    }
}
