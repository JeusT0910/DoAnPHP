<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HoaDon;
class HoaDonController extends Controller
{
    //
    public function index()
    {
        $list = HoaDon::all();
        return response()->json(['data' =>$list]);
    }
}
