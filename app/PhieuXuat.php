<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuXuat extends Model
{
    protected $table ="phieuxuat";
    public function hinhthucxuat()
    {
    	return $this->belongsto('App\HinhThucXuat','id_hinhthucxuat','id');
    }
	public function users()
    {
    	return $this->belongsto('App\Users','id_nguoixuat','id');
    }
}
