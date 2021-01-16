<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsNhanVien = ['dsNhanVien'=>NhanVien::paginate(4)];
        return view('pages.NhanVien.index',$dsNhanVien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.NhanVien.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dsNhanVien = new NhanVien();
        $dsNhanVien->HoTen=$request->hoten;
        $dsNhanVien->NgaySinh=$request->ngaysinh;
        $dsNhanVien->SDT=$request->sdt;
        $dsNhanVien->DiaChi=$request->diachi;
        $dsNhanVien->MatKhau=$request->matkhau;
        $dsNhanVien->TrangThai=$request->trangthai;

        $dsNhanVien->save();
        
        $count =sizeof(NhanVien::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        return redirect('/nhanvien/?page='.$count);
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
        $dsNhanVien = ["dsNhanVien"=>NhanVien::find($id)];
        return view('pages.NhanVien.edit',$dsNhanVien);
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
        $dsNhanVien = NhanVien::find($id);
        $dsNhanVien->HoTen=$request->hoten;
        $dsNhanVien->NgaySinh=$request->ngaysinh;
        $dsNhanVien->SDT=$request->sdt;
        $dsNhanVien->DiaChi=$request->diachi;
        $dsNhanVien->MatKhau=$request->matkhau;
        $dsNhanVien->TrangThai=$request->trangthai;

        $dsNhanVien->save();

        $pages = NhanVien::all();
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
        return redirect('/nhanvien/?page='.$count);
    }


    public function updatetrangthai($id)
    {
        //
        $dsNhanVien = NhanVien::find($id);
        if($dsNhanVien->TrangThai==1)
        {
            $dsNhanVien->TrangThai=0;
        }
        else{
            $dsNhanVien->TrangThai=1;
        }
        
       
        
        
        $dsNhanVien->save();

    
        $pages = NhanVien::all();
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

        return redirect('/nhanvien/?page='.$count);
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
        
        $search_text = $_GET['query'];
        $dsNhanVien = ["dsNhanVien"=>NhanVien::where('HoTen','LIKE','%'.$search_text.'%')
                                   
                                    ->paginate(4)];
        
        return view('pages.NhanVien.search',$dsNhanVien);


        
    }
}
