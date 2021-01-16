<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LoaiBan;
class LoaiBanController extends Controller
{
    //
    public function index()
    {
        $list = LoaiBan::all();
        return response()->json(['data' =>$list]);
    }
}
