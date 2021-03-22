<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialService;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    public function init(){
        
        return Socialite::driver('vkontakte')->redirect();
    }
    
    public function callback(SocialService $service){
        
        $user=Socialite::driver('vkontakte')->user();
        //dd($user);
        $authUser = $service->updateUser($user);
        if ($authUser){
            return redirect()->route('home');
        }
        throw new \Exception('логин не найден');
    }
    
    public function loginFB(){
        
        session()->get('soc.token');
        if (Auth::id()){
            return redirect()->route('home');
        }
        return Socialite::driver('facebook')->redirect();
    }
        
      public function responseFB(SocialService $service){
        
        if (Auth::id()){
            return redirect()->route('home');
        }
          
        $user=Socialite::driver('facebook')->user();
        //dd($user);
        session(['soc.token'=>$user->token]);
        $userInSystem=$service->getUserBySocId($user,'fb');
        Auth::login($userInSystem);
        return redirect()->route('home');
        
    }
    
}
