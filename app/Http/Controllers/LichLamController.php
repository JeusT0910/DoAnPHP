<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LichLam;
class LichLamController extends Controller
{
    //
    public function index()
    {
        $dsLichLam = ["dsLichLam"=>LichLam::paginate(4)];
        return view('pages.LichLam.index',$dsLichLam);
    }
    public function create()
    {
        //

        return view('pages.LichLam.Create');

        
    }
    public function store(Request $request)
    {
        //
        $dsLichLam = new LichLam();
        $dsLichLam->Ca=$request->Ca;
        $dsLichLam->Thu=$request->Thu;
        $dsLichLam->nhan_viens_id=$request->nhanvien;


        $dsLichLam->save();
        
        $count =sizeof(LichLam::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;




            
        return redirect('/lichlam/?page='.$count);
    }
    public function edit($id)
    {
        //
        $dsLichLam = ["dsLichLam"=>LichLam::find($id)];
        return view('pages.LichLam.edit',$dsLichLam);
    }
    public function update(Request $request, $id)
    {
        //
        $dsLichLam = LichLam::find($id);
        $dsLichLam->Ca=$request->Ca;
        $dsLichLam->Thu=$request->Thu;
        $dsLichLam->nhan_viens_id=$request->nhanvien;

        $dsLichLam->save();

        $pages = LichLam::all();
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

        return redirect('/lichlam/?page='.$count);
    }
    public function destroy($id)
    {
        //
        $new=LichLam::destroy($id);
        $count =sizeof(LichLam::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
        return redirect('/lichlam/?page='.$count);
    }
    public function search(Request $request)
    {
        
        $search_text = $_GET['query'];
        
        $dsLichLam = ["dsLichLam"=>LichLam::where('Ca',$search_text)
                                    ->orwhere('Thu',$search_text)
                                    ->paginate(4)];
        
        return view('pages.LichLam.search',$dsLichLam);

        
    }
}
