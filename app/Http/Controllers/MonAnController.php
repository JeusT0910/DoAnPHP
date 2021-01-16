<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MonAn;
class MonAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $dsMonAn = ["dsMonAn"=>MonAn::paginate(4)];
        
        return view('pages.MonAn.index',$dsMonAn);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.MonAn.Create');

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $dsMonAn = new MonAn();
        $dsMonAn->TenMon=$request->TenMon;
        $dsMonAn->DonGia=$request->DonGia;
        $dsMonAn->ChiTiet=$request->ChiTiet;
        $dsMonAn->danh_mucs_id=$request->danhmuc;
        $dsMonAn->don_vi_tinhs_id=$request->donvitinh;
        $dsMonAn->TrangThai=$request->TrangThai;
        
        if($request->hasFile('anh')){// neu anh co ton
            
            
            $img = $request->anh;
            
            $dsMonAn->Anh=$img->getClientOriginalName();
            $request->anh->move('img/product',$img->getClientOriginalName());
        }
        else
            {$dsMonAn->Anh='2.png';}
        
        $dsMonAn->save();


        //$dsMonAn = ["dsMonAn"=>MonAn::paginate(4)];
        

        $count =sizeof(MonAn::all());
        $count = floor( $count/4);
        $count+=1;
            

        

        return redirect('/?page='.$count);
           
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
        $dsMonAn = ["dsMonAn"=>MonAn::find($id)];
        return view('pages.MonAn.edit',$dsMonAn);
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
        $dsMonAn = MonAn::find($id);
        $dsMonAn->TenMon=$request->TenMon;
        $dsMonAn->DonGia=$request->DonGia;
        $dsMonAn->ChiTiet=$request->ChiTiet;
        $dsMonAn->danh_mucs_id=$request->danhmuc;
        $dsMonAn->don_vi_tinhs_id=$request->donvitinh;
        $dsMonAn->TrangThai=$request->TrangThai;
        
        if($request->hasFile('anh')){// neu anh co ton
            
            
            $img = $request->anh;
            
            $dsMonAn->Anh=$img->getClientOriginalName();
            $request->anh->move('img/product',$img->getClientOriginalName());
        }
        $dsMonAn->save();

        //$dsMonAn = ["dsMonAn"=>MonAn::paginate(4)];
        $pages = MonAn::all();
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

        return redirect('/?page='.$count);
    }

    
    public function updatetrangthai($id)
    {
        //
        $dsMonAn = MonAn::find($id);
        if($dsMonAn->TrangThai==1)
        {
            $dsMonAn->TrangThai=0;
        }
        else{
            $dsMonAn->TrangThai=1;
        }
        
       
        
        
        $dsMonAn->save();

        
        $pages = MonAn::all();
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

        return redirect('/?page='.$count);
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
    public function search()
    {
        $search_text = $_GET['query'];
        $dsMonAn = ["dsMonAn"=>MonAn::where('TenMon','LIKE','%'.$search_text.'%')
                                    ->orwhere('DonGia',$search_text)
                                    ->paginate(4)];
        
        return view('pages.MonAn.search',$dsMonAn);
    }
}