<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\DanhMucSP;

use Illuminate\Support\Str;

class DanhMucSPController extends Controller
{
    public function getIndex()
    {
        $danhsach=DanhMucSP::all();

    	return view('admin.danhmucsp.index',compact('danhsach'));
    }
    public function getCreate()
    {

    	return view('admin.danhmucsp.create');
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'tendanhmuc'=>'required',

        ],[
            'tendanhmuc.required'=>'Một số trường bất buộc phải nhập.',
            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $danhmucsp =new DanhMucSP;
        $danhmucsp ->tendanhmuc=$req->tendanhmuc;
        $danhmucsp ->save();
    	return redirect('admin/danhmucsp/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $danhmucsp =DanhMucSP::Find($id);
    	return view('admin/danhmucsp/edit',compact('danhmucsp'));
    }
    public function postEdit(Request $req,$id)
    {
       $this->validate($req,
        [
            'tendanhmuc'=>'required',

        ],[
            'tendanhmuc.required'=>'Một số trường bất buộc phải nhập.',
            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $danhmucsp =DanhMucSP::Find($id);
        $danhmucsp ->tendanhmuc=$req->tendanhmuc;


        $danhmucsp ->save();
        return redirect('admin/danhmucsp/index')->with('notification','Sửa thành công');
    }
    public function getDelete($id)
    {

            $danhmucsp =DanhMucSP::Find($id);
            $danhmucsp ->delete();
            return redirect('admin/danhmucsp/index')->with('notification','Đã xóa  thành công');

    }
}
