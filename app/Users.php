<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table ="users";
    public function phieuxuat()
    {
        return $this->hasMany('App\PhieuXuat','id_nguoixuat','id');
    }
     public function phieunhap()
    {
        return $this->hasMany('App\PhieuNhap','id_nguoinhap','id');
    }
}
