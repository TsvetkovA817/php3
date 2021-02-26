<?php

namespace App\Http\Controllers\News;
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

public $newsKat = [ 
                  ['id'=>1,'nameKat'=>'Категория1'],
                  ['id'=>2,'nameKat'=>'Категория2'],
                  ['id'=>3,'nameKat'=>'Категория3']
                
                ];   
    

public function news()
{
    $prevRoute=route('home');
    $a=array();
    $a[]=$this->news;
    $a[]=$prevRoute;

    return view('news.news', ['arr'=>$a]);
    
}

    
public function newsOne($id)
{
    $news = $this->getNewsById($id);
    
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
    foreach($this->news as $news){
        if ($news['id']==$id){
            return $news;
        }
    }
    return [];
}
    

public function newsKat()
{

    $prevRoute=route('home');
    
    $a=array();
    $a[]=$this->newsKat;
    $a[]=$prevRoute;

    return view('news.categ', ['arr'=>$a]);
    
}



public function newsOneKat($id)
{
   $prevRoute=route('newsKat');
   $prevRoute0=route('home');    

    $a=array();
    $a[]=$this->news;
    $a[]=$prevRoute;
    $a[]=$id;
    $a[]=$prevRoute0;
    return view('news.categ1', ['arr'=>$a]);
}

    
}

