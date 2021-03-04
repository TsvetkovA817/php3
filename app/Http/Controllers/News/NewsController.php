<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    

    
public function news()
{
    $news = DB::table('news')->select('id','name as title', 'desc as inform', 'idk as idKat')->get(); 

    $prevRoute=route('home');
    $a=array();
    $a[]=$news;
    $a[]=$prevRoute;

    return view('news.news', ['arr'=>$a]);
    
}

    
public function newsOne($id)
{
    
    $news = DB::table('news')->select('id','name as title', 'desc as inform', 'idk as idKat')->where('id', $id)->first();
    

    $nameRoute = route('news');
    $nameRoute2 = route('newsKat');
    $prevRoute0=route('home');
    
    if (!empty($news)){

    $a=array();
    $a[]=$news;
    $a[]=$nameRoute;
    $a[]=$id;        
    $a[]=$nameRoute2;
    $a[]=$prevRoute0;   
    return view('news.news1', ['arr'=>$a]);    
        
    
}
    
     return redirect($nameRoute);     //или    
     return redirect()->route('news');    
}
    
private function getNewsById($id)
{
    foreach($news as $v){
        if ((int)$v->id==(int)$id){
            return $news;
        }
    }
    return [];
}
    

public function newsKat()
{

    $newsKat = DB::table('categ')->select('id','name as nameKat')->get(); 
    
    $prevRoute=route('home');
        
    $a=array();
    $a[]=$newsKat;
    $a[]=$prevRoute;

    return view('news.categ', ['arr'=>$a]);
    
}



public function newsOneKat($id)
{
   $news = DB::table('news')->select('id','name as title', 'desc as inform', 'idk as idKat')->where('idk', $id)->get();
    
   $prevRoute=route('newsKat');
   $prevRoute0=route('home');    

    $a=array();
    $a[]=$news;
    $a[]=$prevRoute;
    $a[]=$id;
    $a[]=$prevRoute0;
    return view('news.categ1', ['arr'=>$a]);
}

    
}

