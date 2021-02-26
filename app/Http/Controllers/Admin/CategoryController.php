<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{

    protected $newsKat = [ 
                  ['id'=>1,'nameKat'=>'Категория1'],
                  ['id'=>2,'nameKat'=>'Категория2'],
                  ['id'=>3,'nameKat'=>'Категория3']
                
                ]; 
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $prevRoute=route('admin');
       $a=[];
       $a[]=$this->newsKat;
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
        
                
        $this->newsKat[] = ['id'=>intval(array_key_last( $this->newsKat))+2,'nameKat'=>$request->input('name')];
        //print_r($this->newsKat);
        
        //return redirect()->route('admin');
        return response('сохранено');
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
