<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    //
    public function monAn()
    {
        return $this->belongsTo('App\MonAn','mon_ans_id','id');
    }
    public function hoaDon()
    {
        return $this->belongsTo('App\LichLam','hoa_don','id');
    }
}
