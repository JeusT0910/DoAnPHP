<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LichLam;
class LichLamController extends Controller
{
    //
    public function index()
    {
        $list = LichLam::all();
        return response()->json(['data' =>$list]);
    }
}
