<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ban;
class BanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dsBan = ['dsBan'=>Ban::paginate(4)];
        return view('pages.Ban.index',$dsBan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Ban.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dsBan = new Ban();
        $dsBan->TenBan=$request->tenban;
        $dsBan->loai_bans_id=$request->loaiban;
        $dsBan->TrangThai=$request->trangthai;

        $dsBan->save();
        
        $count =sizeof(Ban::all());
        if($count%4!=0)
        {
            $count = floor( $count/4);
            $count+=1;
        }
        else
            $count/=4;
            
            

        return redirect('/ban/?page='.$count);
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
        $dsBan = ["dsBan"=>Ban::find($id)];
        return view('pages.Ban.edit',$dsBan);
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
        $dsBan = Ban::find($id);
        $dsBan->TenBan=$request->tenban;
        $dsBan->loai_bans_id=$request->loaiban;
        $dsBan->TrangThai=$request->trangthai;

        $dsBan->save();

        $pages = Ban::all();
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
        return redirect('/ban/?page='.$count);
    }


    public function updatetrangthai($id)
    {
        //
        $dsBan = Ban::find($id);
        if($dsBan->TrangThai==1)
        {
            $dsBan->TrangThai=0;
        }
        else{
            $dsBan->TrangThai=1;
        }
        
       
        
        
        $dsBan->save();

    
        $pages = Ban::all();
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

        return redirect('/ban/?page='.$count);
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
        if ($request->ajax()) {
            $output = '';
            $products = Ban::where('TenBan','LIKE','%'.$request->search.'%')->get();
            if ($products) {
                foreach ($products as $i) {
                    $output .= '<tr>
                    <td>' . $i['TenBan'] . '</td>
                    <td>' . $i['loai_bans_id'] . '</td>
                    <td>' . $i['TrangThai'] . '</td>
                    </tr>';
                }
            }
            return Response($output);
        }
    }
}
