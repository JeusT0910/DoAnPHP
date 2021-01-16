<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ThongTin;
class ThongTinController extends Controller
{
    //
    public function index()
    {
        $list = ThongTin::all();
        return response()->json(['data' =>$list]);
    }
}
