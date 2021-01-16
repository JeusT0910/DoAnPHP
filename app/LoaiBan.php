<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBan extends Model
{
    //
    public function ban()
    {
        return $this->hasMany('App\Ban', 'bans_id', 'id');
    }
}
