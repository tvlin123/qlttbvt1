<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table ="sanpham";
    public function danhmuc()
    {
    	return $this->belongsto('App\DanhMucSP','id_danhmuc','id');
    }
}
