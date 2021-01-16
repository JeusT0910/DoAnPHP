<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MonAn;
class MonAnController extends Controller
{
    //
    public function index()
    {
        $list = MonAn::all();
        return response()->json(['data' =>$list]);
    }
}
