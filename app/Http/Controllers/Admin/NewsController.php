<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Categ;
use App\Srcn;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsEditRequest;

class NewsController extends Controller
{

   /*
    public $news = [
                  ['id'=>1,'title'=>'Новость1','inform'=>'Текст Новость1','idKat'=>1],
                  ['id'=>2,'title'=>'Новость2','inform'=>'Текст Новость2','idKat'=>2],
                  ['id'=>3,'title'=>'Новость3','inform'=>'Текст Новость3','idKat'=>3],
                  ['id'=>4,'title'=>'Новость4','inform'=>'Текст Новость4','idKat'=>3]

                ];
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       //v1:
       //$news = DB::table('news')->select('news.id','news.name as title', 'news.desc as inform', 'news.idk as idKat',  'news.updated_at','categ.name as nameKat' )->leftJoin('categ', 'news.idk', '=', 'categ.id')->get();

       //v2:
       $news = News::query()->select('news.id','news.name as title', 'news.desc as inform', 'news.idk as idKat',  'news.updated_at','categ.name as nameKat' )->leftJoin('categ', 'news.idk', '=', 'categ.id')->paginate(8);

       $prevRoute=route('admin');
       $a=[];
       $a[]=$news;
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
    //v1:
    //public function store(Request $request)
    //v2:
    public function store(NewsCreateRequest $request)
    {
         //v1:
         //$request->validate(['name'=>'required']);     // поле обязательно к заполнению

         //dd($request->all());

        //v1:
        //$id = DB::table('news')->insertGetId(['name' => $request->input('name'), 'desc' => $request->input('desc')]  );

        /*
        //v2:
        $id = News::query()->insertGetId(['name' => $request->input('name'), 'desc' => $request->input('desc')]  );

        if (!empty($id)) {$o='сохранено ';}
        else {$o='не сохранено';}
        $o .='<br><br> <a href="/adminn">Управление новостями</a><br>' ;
        return response($o);
        */

        //v3:
        $news= new News();

        if($request->isMethod('post')){
            $news->fill($request->all());
            $isOk=$news->save();
            if($isOk){
            return redirect()->route('adminNews');
            }
            else { $o='не сохранено';
                    $o .='<br><br> <a href="/adminn">Управление новостями</a><br>' ;
                    return response($o); }
        }
        return view('news.admin.news.add', [ 'categories'=>Categ::query()->select(['id','name'])->get() ] );
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
    //v1:
    //public function update(Request $request, News $news, Srcn $srcn)
    public function update(NewsEditRequest $request, News $news, Srcn $srcn)
    {
        //dd($news);

           if($request->isMethod('post')){
            $news->fill($request->all());
            $isOk=$news->save();
            if($isOk){
            return redirect()->route('adminNews');
            }
            else { $o='не сохранено';
                    $o .='<br><br> <a href="/adminn">Управление новостями</a><br>' ;
                    return response($o); }
        }
     return view('news.admin.news.update', ['news'=>$news, 'categories'=>Categ::query()->select(['id','name'])->get(), 'srcn'=>Srcn::query()->select(['id','name'])->get() ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete(News $news)
    {
         //dump($news);
        dd($news);
        $news->delete();
        return redirect()->route('adminNews');
    }   
    

}
