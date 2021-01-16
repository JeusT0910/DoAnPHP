<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongBaoController extends Controller
{
    //
    public function index() 
    {
        return view('pages.Notification.notification');
    }
    public function hienthi()
    {
        return view('pages.Notification.load');
    }
}
