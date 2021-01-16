<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    //
    public function loaiBan()
    {
        return $this->belongsTo('App\LoaiBan','loai_bans_id','id');
    }
    public function hoaDon()
    {
        return $this->hasOne('App\HoaDon','hoa_dons_id','id');
    }
    public function dsban()
    {
        return $this->all();
    }


}
