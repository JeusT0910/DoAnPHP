<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    public function ban() {
        return $this->belongsTo('App\Ban', 'bans_id', 'id');
    }
    public function nhanVien() {
        return $this->belongsTo('App\NhanVien', 'nhan_viens_id', 'id');
    }
    public function chiTietHoaDon() {
        return $this->hasOne('App\ChTietHoaDon', 'chi_tiet_hoa_dons_id', 'id');
    }
}
