<?php

namespace App\Services;

use App\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;


class SocialService
{

    public function updateUser($user):bool
    {
        //dd($user);
        $email=$user->getEmail();
        $authUser=User::where('email',$email)->first();
        if ($authUser){
            \Auth::login($authUser);
            $authUser->name=$user->getName();
            return $authUser->save();
        }
        return false;
    }
    
    //поиск и созд юзера по данным из соц сети
    public function getUserBySocId($user, string $socName)
    {
        $userInSystem=User::query()
            ->where('id_in_soc',$user->id)
            ->where('type_auth',$socName)
            ->first();
        if(empty($userInSystem)){
            $userInSystem=new User();
            $userInSystem->fill([
                'name'=>!empty($user->getName()) ?$user->getName():'',
                'email'=>!empty($user->getEmail()) ?$user->getEmail():'',
                'password'=>'',
                'id_in_soc'=>!empty($user->getId()) ?$user->getId():'',
                'type_auth'=>$socName,
                'avatar'=>!empty($user->getAvatar()) ?$user->getAvatar():'',
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
    
}
