<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    
    public $news = [ 
                  ['id'=>1,'title'=>'Новость1','inform'=>'Текст Новость1','idKat'=>1],
                  ['id'=>2,'title'=>'Новость2','inform'=>'Текст Новость2','idKat'=>2],
                  ['id'=>3,'title'=>'Новость3','inform'=>'Текст Новость3','idKat'=>3],
                  ['id'=>4,'title'=>'Новость4','inform'=>'Текст Новость4','idKat'=>3]
                
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
       $a[]=$this->news;
       $a[]=$prevRoute;
        
       return view('news.admin.news.index', ['arr'=>$a]);    
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.admin.news.add'); 
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
         dd($request->all());    
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
