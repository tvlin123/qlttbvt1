<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSP extends Model
{
    protected $table ="danhmucsp";
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham','id_danhmuc','id');
    }
}
