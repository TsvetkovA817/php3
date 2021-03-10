<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    
    public function index()
    {
       $prevRoute=route('home');
       return view('news.admin.admin', ['prevRoute'=>$prevRoute]);    
    }


  
    public function adminNews()
    {
       $prevRoute=route('admin');
       return view('news.admin.news.index', ['prevRoute'=>$prevRoute]);    
    }

    public function adminZdt()
    {
       $prevRoute=route('admin');
       return view('news.admin.zdt.index', ['prevRoute'=>$prevRoute]);    
    }

}
