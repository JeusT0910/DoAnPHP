<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDon;
class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dsHoaDon = ['dsHoaDon'=>HoaDon::paginate(4)];
        return view('pages.HoaDon.index',$dsHoaDon);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.HoaDon.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $dsHoaDon = new HoaDon();
        $dsHoaDon->Soluong=$request->soluong;
        $dsHoaDon->NgayLap=$request->ngaylap;
        $dsHoaDon->NgayThanhToan=$request->ngay;
        $dsHoaDon->ThanhTien=$request->thanhtien;
        $dsHoaDon->bans_id=$request->ban;
        $dsHoaDon->nhan_viens_id=$request->nhanvien;
        $dsHoaDon->TrangThai=$request->trangthai;


        $dsHoaDon->save();
        
        $count =sizeof(HoaDon::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        
            
        return redirect('/hoadon/?page='.$count);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dsHoaDon = ["dsHoaDon"=>HoaDon::find($id)];
        return view('pages.HoaDon.edit',$dsHoaDon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dsHoaDon = HoaDon::find($id);
        $dsHoaDon->SoLuong=$request->soluong;
        $dsHoaDon->NgayLap=$request->ngaylap;
        $dsHoaDon->NgayThanhToan=$request->ngay;
        $dsHoaDon->ThanhTien=$request->thanhtien;
        $dsHoaDon->bans_id=$request->ban;
        $dsHoaDon->nhan_viens_id=$request->nhanvien;
        $dsHoaDon->TrangThai=$request->trangthai;

        $dsHoaDon->save();

        $pages = HoaDon::all();
        $count =0;
        foreach($pages as $i)
        {
            $count++;
            if($i['id']==$id)
            {
                $count = floor( $count/4);
                $count+=1;
                break;
            }

        }

        return redirect('/hoadon/?page='.$count);
    }

    public function updatetrangthai($id)
    {
        //
        $dsHoaDon = HoaDon::find($id);
        if($dsHoaDon->TrangThai==0)
        {
            $dsHoaDon->TrangThai=1;
        }
        else{
            $dsHoaDon->TrangThai=0;
        }

        $dsHoaDon->save();

        $pages = HoaDon::all();
        $count =0;
        foreach($pages as $i)
        {
            $count++;
            if($i['id']==$id)
            {
                $count = floor( $count/4);
                $count+=1;
                break;
            }

        }

        return redirect('/hoadon/?page='.$count);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function search(Request $request)
    {
        
        $search_text =  $_GET['query'];
        $dsHoaDon = ["dsHoaDon"=>HoaDon::where('ThanhTien',$search_text)
                                    ->orwhere('SoLuong',$search_text)
                                    ->paginate(4)];
         return view('pages.HoaDon.search',$dsHoaDon);

        
    }
}
