<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MonAn extends Model
{
    //
    public function danhMuc()
    {
        return $this->belongsTo('App\DanhMuc','danh_mucs_id','id');
    }
    public function donViTinh()
    {
        return $this->belongsTo('App\DonViTinh', 'don_vi_tinhs_id', 'id');
    }
    public function chiTietHoaDon()
    {
        return $this->belongsTo('App\ChiTietHoaDon','chi_tiet_hoa_dons_id','id');
    }
}
