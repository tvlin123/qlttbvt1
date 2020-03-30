<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhThucXuat extends Model
{
    protected $table ="hinhthucxuat";
    public function phieuxuat()
    {
        return $this->hasMany('App\PhieuXuat','id_hinhthucxuat','id');
    }
}
