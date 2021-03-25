<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/admin', ['uses'=>'Admin\IndexController@index', 'as'=>'admin' ] )->middleware('auth');

Route::get('/',  ['uses'=>'HomeController@index', 'as'=>'home']  );

Route::get('/news',  ['uses'=>'News\NewsController@news', 'as'=>'news'] );

Route::get('/news/{news}', ['uses'=>'News\NewsController@newsOne', 'as'=>'newsOne']  );

Route::get('/newsKat', ['uses'=>'News\NewsController@newsKat', 'as'=>'newsKat']  );

Route::get('/newsOneKat/{id}', ['uses'=>'News\NewsController@newsOneKat', 'as'=>'newsOneKat']  );

Route::group(['middleware' => 'auth'], function () {

 Route::get('/adminc', ['uses'=>'Admin\CategoryController@index', 'as'=>'adminCateg']  )->middleware('auth');

 Route::get('/admaddctg', ['uses'=>'Admin\CategoryController@create', 'as'=>'adminAddCtg']  )->middleware('auth');

 Route::post('/admsavectg', ['uses'=>'Admin\CategoryController@store', 'as'=>'adminSaveCtg']  )->middleware('auth');

 Route::get('/admshowctg/{id}', ['uses'=>'Admin\CategoryController@show', 'as'=>'adminShowCtg']  )->middleware('auth');

 Route::get('/admDelCtg/{categ}', ['uses'=>'Admin\CategoryController@delete', 'as'=>'adminDelCtg']  )->middleware('auth');

 Route::match(['post','get'],'/admUpdCtg/{categ}', ['uses'=>'Admin\CategoryController@update', 'as'=>'adminUpdCtg']  )->middleware('auth');

 Route::get('/adminn', ['uses'=>'Admin\NewsController@index', 'as'=>'adminNews']  )->middleware('auth');

 Route::get('/admAddNew', ['uses'=>'Admin\NewsController@create', 'as'=>'adminAddNew']  )->middleware('auth');

 Route::post('/admSaveNew', ['uses'=>'Admin\NewsController@store', 'as'=>'adminSaveNew']  )->middleware('auth');

 Route::get('/admDelNew/{news}', ['uses'=>'Admin\NewsController@delete', 'as'=>'adminDelNew']  )->middleware('auth');

 Route::match(['post','get'],'/admUpdNew/{news}', ['uses'=>'Admin\NewsController@update', 'as'=>'adminUpdNew']  )->middleware('auth');

});

//обрат связь
Route::get('/contacts', ['uses'=>'News\ContactsController@contacts', 'as'=>'contacts']  );

Route::post('/contactsSave', ['uses'=>'News\ContactsController@store', 'as'=>'contactsSave']  );
//запр.данных
Route::get('/zaprdt', ['uses'=>'News\zaprdtController@zaprdt', 'as'=>'zaprData']  );

Route::post('/zaprdtSave', ['uses'=>'News\zaprdtController@store', 'as'=>'zaprdtSave']  );

//запр.данных админ
Route::get('/adminz', ['uses'=>'Admin\ZdtController@index', 'as'=>'adminZdt']  )->middleware('auth');
Route::get('/admshowzdt/{id}', ['uses'=>'Admin\ZdtController@show', 'as'=>'adminShowZdt']  )->middleware('auth');
Route::get('/admDelZdt/{zdt}', ['uses'=>'Admin\ZdtController@delete', 'as'=>'adminDelZdt']  )->middleware('auth');
Route::match(['post','get'],'/admUpdZdt/{zdt}', ['uses'=>'Admin\ZdtController@update', 'as'=>'adminUpdZdt']  )->middleware('auth');

//обр.связь
Route::get('/admino', ['uses'=>'Admin\OsvController@index', 'as'=>'adminOsv']  )->middleware('auth');
Route::get('/admshowosv/{id}', ['uses'=>'Admin\OsvController@show', 'as'=>'adminShowOsv']  )->middleware('auth');
Route::get('/admDelOsv/{osv}', ['uses'=>'Admin\OsvController@delete', 'as'=>'adminDelOsv']  )->middleware('auth');
Route::match(['post','get'],'/admUpdOsv/{osv}', ['uses'=>'Admin\OsvController@update', 'as'=>'adminUpdOsv']  )->middleware('auth');

//Управление пользователями
Route::group(['middleware' => 'auth'], function () {
 Route::get('/adminu', ['uses'=>'Admin\UsrController@index', 'as'=>'adminUsr']  );
 Route::get('/admshowUsr/{id}', ['uses'=>'Admin\UsrController@show', 'as'=>'adminShowUsr']  );
 Route::get('/admDelUsr/{user}', ['uses'=>'Admin\UsrController@delete', 'as'=>'adminDelUsr']  );
 Route::match(['post','get'],'/admUpdUsr/{user}', ['uses'=>'Admin\UsrController@update', 'as'=>'adminUpdUsr']  );
});

//роуты аутентификации
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//

Route::get('/parser/{rss}', ['uses'=>'Admin\ParserController@index']  );
Route::get('/parser10', ['uses'=>'Admin\ParserController@parser10']  );
Route::get('/parser12', ['uses'=>'Admin\ParserController@parser12']  );
Route::get('/parser13', ['uses'=>'Admin\ParserController@parser13']  );

Route::get('/auth/vk', ['uses'=>'SocialiteController@init'] )->name('vk.init');
Route::get('/auth/vk/callback', ['uses'=>'SocialiteController@callback'] )->name('vk.callback');

Route::get('/auth/fb', ['uses'=>'SocialiteController@loginFB'] )->name('fb.loginFB');
Route::get('/auth/vk/responseFB', ['uses'=>'SocialiteController@responseFB'] )->name('fb.responseFB');


//Управление таблицей resources( ссылки на rss-каналы)
Route::group(['middleware' => 'auth'], function () {
Route::get('/resDel/{resources}', ['uses'=>'Admin\ResController@delete', 'as'=>'resDel']  ); 
Route::resource('res', 'Admin\ResController', ['names' => ['create' => 'resAdd', 'show' => 'resShow', 'update' => 'resUpd',  'store'=>'resStore', 'edit'=>'resEdit'],
                                         'only'  => ['index', 'show','create', 'store' ,'update',  'edit']
                                        ]);    
    
});





/*
Route::get('/', function () {
    return view('welcome');
});


//1
Route::get('/hello1', function () {
    return "Hello world";
});


//2
Route::get('/hello2/{name}', function (string $name) {
    return "Hello, ".$name;
});


//3 как в методичке
$text='Привет мир';
$title='Страница 1';
$s="<!DOCTYPE html>
<head>
    <title>$title</title>
</head>
<body>
    <h1>$text</h1>
	  Lorem ipsum dolor sit amet
</body>	  
</html>";	


Route::get('/hello3', function () use($text, $title) {
    return "<!DOCTYPE html>
<head>
    <title>$title</title>
</head>
<body>
    <h1>$text</h1>
	  Lorem ipsum dolor sit amet
</body>	  
</html>"; });



Route::get('/hello4', function () use($text, $title, $s) {
    return $s; });
*/
