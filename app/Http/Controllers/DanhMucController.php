<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMuc;
class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dsDanhMuc = ['dsDanhMuc'=>DanhMuc::paginate(4)];
        return view('pages.DanhMuc.index',$dsDanhMuc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DanhMuc.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dsDanhMuc = new DanhMuc();
        $dsDanhMuc->TenDM=$request->tendm;
        $dsDanhMuc->TrangThai=$request->trangthai;

        $dsDanhMuc->save();
        
        $count =sizeof(DanhMuc::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        return redirect('/danhmuc/?page='.$count);
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
        $dsDanhMuc = ["dsDanhMuc"=>DanhMuc::find($id)];
        return view('pages.DanhMuc.edit',$dsDanhMuc);
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
        $dsDanhMuc = DanhMuc::find($id);
        $dsDanhMuc->TenDM=$request->tendm;
        $dsDanhMuc->TrangThai=$request->trangthai;

        $dsDanhMuc->save();

        $pages = DanhMuc::all();
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
        return redirect('/danhmuc/?page='.$count);
    }


    public function updatetrangthai($id)
    {
        $dsDanhMuc = DanhMuc::find($id);
        if($dsDanhMuc->TrangThai==1)
        {
            $dsDanhMuc->TrangThai=0;
        }
        else{
            $dsDanhMuc->TrangThai=1;
        }
        
       
        
        
        $dsDanhMuc->save();

    
        $pages = DanhMuc::all();
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

        return redirect('/danhmuc/?page='.$count);
   
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
        $dsDanhMuc = ["dsDanhMuc"=>DanhMuc::where('TenDM','LIKE','%'.$search_text.'%')
                                   
                                    ->paginate(4)];
        
        return view('pages.DanhMuc.search',$dsDanhMuc);

        
    }

}
