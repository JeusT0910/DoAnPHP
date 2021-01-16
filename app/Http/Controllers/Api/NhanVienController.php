<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NhanVien;
class NhanVienController extends Controller
{
    //
    public function index()
    {
        $list = NhanVien::all();
        return response()->json(['data' =>$list]);
    }

}
