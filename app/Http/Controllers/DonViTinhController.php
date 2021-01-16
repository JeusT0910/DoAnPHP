<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonViTinh;
class DonViTinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dsDonViTinh = ['dsDonViTinh'=>DonViTinh::paginate(4)];
        return view('pages.DonViTinh.index',$dsDonViTinh);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.DonViTinh.Create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dsDonViTinh = new DonViTinh();
        $dsDonViTinh->TenDV=$request->tendv;

        $dsDonViTinh->save();
        
        $count =sizeof(DonViTinh::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        return redirect('/donvitinh/?page='.$count);

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
        $dsDonViTinh = ["dsDonViTinh"=>DonViTinh::find($id)];
        return view('pages.DonViTinh.edit',$dsDonViTinh);
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
        $dsDonViTinh = DonViTinh::find($id);
        $dsDonViTinh->TenDV=$request->tendv;
 

        $dsDonViTinh->save();

        $pages = DonViTinh::all();
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
        return redirect('/donvitinh/?page='.$count);
    
    }

    public function updatetrangthai($id)
    {
        //
        $dsDonViTinh = DonViTinh::find($id);
        if($dsDonViTinh->TrangThai==0)
        {
            $dsDonViTinh->TrangThai=1;
        }
        else{
            $dsDonViTinh->TrangThai=0;
        }
        
       
        
        
        $dsDonViTinh->save();

        
        $pages = DonViTinh::all();
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

        return redirect('/donvitinh/?page='.$count);
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
        $new=DonViTinh::destroy($id);
        $count =sizeof(DonViTinh::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        return redirect('/donvitinh/?page='.$count);
    }

    public function search(Request $request)
    {
        
        $search_text = $_GET['query'];
        $dsDonViTinh = ["dsDonViTinh"=>DonViTinh::where('TenDV','LIKE','%'.$search_text.'%')
                                   
                                    ->paginate(4)];
        
        return view('pages.DonViTinh.search',$dsDonViTinh);

        
    }
 
}
