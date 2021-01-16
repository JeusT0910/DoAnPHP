<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichLam extends Model
{
    //
    public function nhanVien()
    {
        return $this->belongsTo('App\NhanVien', 'nhan_viens_id', 'id');
    }
}
