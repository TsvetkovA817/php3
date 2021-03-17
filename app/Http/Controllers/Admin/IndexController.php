<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    
    public function index()
    {
        
       $isAdm=false;
       if(Auth::check()){
        $user=Auth::user();
        if($user->role==1){ 
        $isAdm=true; }                     
        //dd($user);
        }
       return view('news.admin.admin', ['isAdm'=>$isAdm]);    
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
