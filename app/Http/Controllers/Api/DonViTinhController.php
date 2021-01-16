<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DonViTinh;
class DonViTinhController extends Controller
{
    //
    public function index()
    {
        $list = DonViTinh::all();
        return response()->json(['data' =>$list]);
    }
}
