<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Res;

class ResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $reso = Res::query()->select('id','cname', 'cstatus', 'updated_at')->paginate(4);    
       //dd($reso);
       return view('news.admin.res.index', ['reso'=>$reso]);    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.admin.res.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $res= new Res();

        if($request->isMethod('post')){
            $res->fill($request->all());
            $res->save();
            return redirect()->route('res.index');
        }
        return view('news.admin.res.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $reso = Res::query()->select('id','cname', 'cstatus', 'updated_at', 'cdesc', 'clink')->where('id',$id)->first();    
       //dd($reso);
       return view('news.admin.res.show', ['reso'=>$reso]);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reso = Res::query()->select('id','cname', 'cstatus', 'updated_at', 'cdesc', 'clink')->where('id',$id)->first();    
       //dd($reso);
      return view('news.admin.res.update', ['reso'=>$reso]);  
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
          //dd($id);   
          //dd($request);
          $o='не сохранено';
          $reso = Res::find($id);
        
          if($request->isMethod('put')){
            $reso->fill($request->all());
            $isOk=$reso->save();
            //$isOk=false;
            if($isOk) { $o='Сохранено'; }
          }
    $o .='<br><br> <a href="/res">Управление каналами</a><br>' ;    
    return response($o);     
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
    
    public function delete($id)
    {
        //dd($id); 
        $o='не удалено ';
        $reso = Res::find($id);
         $isOk=$reso->delete();
        if($isOk) { $o='удалено '; }
    $o .='<br><br> <a href="/res">Управление каналами</a><br>' ;    
    return response($o);            
    }
    
}
