<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    protected $table ="phieunhap";
    public function hinhthucnhap()
    {
    	return $this->belongsto('App\HinhThucNhap','id_hinhthucnhap','id');
    }
	public function users()
    {
    	return $this->belongsto('App\Users','id_nguoinhap','id');
    }
}
