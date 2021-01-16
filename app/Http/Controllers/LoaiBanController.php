<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiBan;
class LoaiBanController extends Controller
{
    //
    public function index()
    {
        
        $dsLoaiBan = ["dsLoaiBan"=>LoaiBan::paginate(4)];
        
        return view('pages.LoaiBan.index',$dsLoaiBan);
    }
    public function create()
    {
        //
        return view('pages.LoaiBan.Create');
    }
    public function store(Request $request)
    {
        //
        $dsLoaiBan = new LoaiBan();
        $dsLoaiBan->TenLoaiBan=$request->TenLoaiBan;


        $dsLoaiBan->save();
        
        $count =sizeof(LoaiBan::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        
            
        return redirect('/loaiban/?page='.$count);


    }
    public function edit($id)
    {
        //
        $dsLoaiBan = ["dsLoaiBan"=>LoaiBan::find($id)];
        return view('pages.LoaiBan.edit',$dsLoaiBan);
    }
    public function update(Request $request, $id)
    {
        //
        $dsLoaiBan = LoaiBan::find($id);
        $dsLoaiBan->TenLoaiBan=$request->TenLoaiBan;
        $dsLoaiBan->save();

        $pages = LoaiBan::all();
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

        return redirect('/loaiban/?page='.$count);
    }

    public function updatetrangthai($id)
    {
        //
        $dsMonAn = LoaiBan::find($id);
        if($dsMonAn->TrangThai==0)
        {
            $dsMonAn->TrangThai=1;
        }
        else{
            $dsMonAn->TrangThai=0;
        }
        
       
        
        
        $dsMonAn->save();

        
        $pages = LoaiBan::all();
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

        return redirect('/loaiban/?page='.$count);
    }
    
    public function search(Request $request)
    {
        
        $search_text = $_GET['query'];
        
        $dsLoaiBan = ["dsLoaiBan"=>LoaiBan::where('TenLoaiBan','LIKE','%'.$search_text.'%')
                                    ->paginate(4)];
        
        return view('pages.LoaiBan.search',$dsLoaiBan);

        
    }
}
