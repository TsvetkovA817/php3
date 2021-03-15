<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Zdt;
use App\Http\Requests\ZdtEditRequest;

class ZdtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $zdt = Zdt::query()->select('id','name', 'updated_at')->paginate(4);
       //dd($zdt);
       return view('news.admin.zdt.index', ['zdt'=>$zdt]);

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
    public function update(ZdtEditRequest $request, Zdt $zdt)
    {

            //dd($zdt);
            //dd($request);

           if($request->isMethod('post')){
            $zdt->fill($request->all());
            $isOk=$zdt->save();
            //$isOk=false;
            if($isOk){
            return redirect()->route('adminZdt')->with('success','запись обновлена');}
            else{
               return redirect()->route('adminZdt')->with('error','запись не обновлена');}
           }
        return view('news.admin.zdt.update', ['zdt'=>$zdt]);
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
    public function delete(Zdt $zdt)
    {
        //dd($zdt);
        $zdt->delete();
        return redirect()->route('adminZdt');
    }
}
