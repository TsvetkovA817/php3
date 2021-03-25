<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->select('id','name', 'updated_at')->paginate(4);    
       //dd($users);
       return view('news.admin.users.index', ['usersList'=>$users]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, User $user )
    {
            //dd($user);
            //dd($request);
            //if(Hash::check($request->post('password'), $user->password)){ }
        
          if($request->isMethod('post')){
               
              $p1=$request->post('password');
              $p2=$request->post('password2');
              //$h= Hash::make($p1) ;
              //dd($h);
              if (!empty($p1) && !empty($p2) && $p1==$p2){
                 $user->fill(['name'=>$request->post('name'), 'email'=>$request->post('email'), 'password'=>Hash::make($p1) ]);  
              }
              else {         
                 $user->fill(['name'=>$request->post('name'), 'email'=>$request->post('email') ]);
              }
               
            $isOk=$user->save();
            //$isOk=false;
            if($isOk){
               return redirect()->route('adminUsr')->with('success','запись обновлена');}
            else{
               return redirect()->route('adminUsr')->with('error','запись не обновлена');}
           }
        return view('news.admin.users.update', ['user'=>$user]);
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
