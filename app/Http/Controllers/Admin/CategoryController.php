<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $newsKat = DB::table('categ')->select('id','name as nameKat', 'updated_at')->get(); 
     
       $prevRoute=route('admin');
       $a=[];
       $a[]=$newsKat;
       $a[]=$prevRoute;
        
       return view('news.admin.categ.index', ['arr'=>$a]);    
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.admin.categ.add');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(['name'=>'required']);     // поле обязательно к заполнению
        
        //dd($request->all());            
        //dd($request->input('name'));
        //dd($request->only('name','desc'));
        //dd($request->except('name','desc'));
        //dd($request->has('name'));   //=true
        //dd($request->path());
        //dd($request->url());  
        //dd($request->fullurl());  
        //dd($request->query('гет парам'));  
        //dd($request->get('гет парам'));  
        //$newsKat[] = ['id'=>intval(array_key_last( $this->newsKat))+2,'nameKat'=>$request->input('name')];
        //print_r($this->newsKat);
        
        $id = DB::table('categ')->insertGetId(['name' => $request->input('name'), 'desc' => $request->input('desc')]
);
        if (!empty($id)) {$o='сохранено ';}      
        else {$o='не сохранено';}
        $o .='<br><br> <a href="/adminc">Управление Категориями</a><br>' ;   
        //return redirect()->route('admin');
        return response($o);
        //return response->view('view.any');
        //return response->download('file.any');
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    $categ = DB::table('categ')->select('id','name', 'desc','updated_at')->where('id', $id)->first();
    
    if (!empty($categ)){

    $a=array();
    $a[]=$categ;
    $a[]=$id;        
    return view('news.admin.categ.show', ['arr'=>$a]);    
    }
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
}
