<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    //
    public function lichLam()
    {
        return $this->hasMany('App\LichLam','lich_lams_id','id');
    }
    public function hoaDon()
    {
        return $this->hasMany('App\HoaDon','hoa_dons_id','id');
    }
}
