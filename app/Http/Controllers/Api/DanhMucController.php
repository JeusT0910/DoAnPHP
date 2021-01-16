<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DanhMuc;
class DanhMucController extends Controller
{
    //
    public function index()
    {
        $list = DanhMuc::all();
        return response()->json(['data' =>$list]);
    }
}
