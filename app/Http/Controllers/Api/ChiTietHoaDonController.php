<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ChiTietHoaDon;
class ChiTietHoaDonController extends Controller
{
    //
    public function index()
    {
        $list= ChiTietHoaDon::all()->get();
        return response()->json(['data' =>$list]);
    }
}
