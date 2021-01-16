<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ban;
class BanController extends Controller
{
    //
    public function index()
    {
        $list = Ban::all();
        return response()->json(['data' => $list]);
    }
}
