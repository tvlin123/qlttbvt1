<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Users;
use Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function getIndex()
    {
        $danhsach=Users::all();

    	return view('admin.Users.index',compact('danhsach'));
    }
    public function getCreate()
    {

    	return view('admin.users.create');
    }
    public function postCreate(Request $req)
    {
        $this->validate($req,
        [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ],[
            'name.required'=>'Một số trường bất buộc phải nhập.',
            'email.required'=>'Một số trường bất buộc phải nhập.',
            'password.required'=>'Một số trường bất buộc phải nhập.',

            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $users=new Users;
        $users->name=$req->name ;
        $users->email=$req->email ;
        $users->password=Hash::make($req->password);
        $users->save();
    	return redirect('admin/users/index')->with('notification','Thêm thành công');
    }
    public function getEdit($id)
    {
        $users=Users::Find($id);
    	return view('admin/users/edit',compact('users'));
    }
    public function postEdit(Request $req,$id)
    {
      $this->validate($req,
        [
            'name'=>'required',
            'email'=>'required',

        ],[
            'name.required'=>'Một số trường bất buộc phải nhập.',
            'email.required'=>'Một số trường bất buộc phải nhập.',


            /*'name.unique'=>'Loại sản phẩm đã có tồn tại'*/

        ]);
        $users=Users::Find($id);
        $users->name=$req->name ;
        $users->email=$req->email ;
        if($req->password!="")
        {
            $users->password=Hash::make($req->password);
        }
        $users->save();
        return redirect('admin/users/index')->with('notification','Sửa thành công');
    }
    public function getDelete($id)
    {

            $users=Users::Find($id);
            $users->delete();
            return redirect('admin/users/index')->with('notification','Đã xóa  thành công');

    }
}
