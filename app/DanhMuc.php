<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    //
    public function MonAn()
    {
        return $this->hasMany('App\MonAn', 'danh_mucs_id','id');
    }
}
