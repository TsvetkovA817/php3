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

//use App\Http\Controllers\Admin\CategoryController;   



Route::get('/',  ['uses'=>'HomeController@index', 'as'=>'home']  );

Route::get('/admin', ['uses'=>'Admin\IndexController@index', 'as'=>'admin' ] );

Route::get('/news',  ['uses'=>'News\NewsController@news', 'as'=>'news'] );

Route::get('/news/{news}', ['uses'=>'News\NewsController@newsOne', 'as'=>'newsOne']  );

Route::get('/newsKat', ['uses'=>'News\NewsController@newsKat', 'as'=>'newsKat']  );

Route::get('/newsOneKat/{id}', ['uses'=>'News\NewsController@newsOneKat', 'as'=>'newsOneKat']  );

Route::get('/adminc', ['uses'=>'Admin\CategoryController@index', 'as'=>'adminCateg']  );
//Route::get('/adminc', ['uses'=>'CategoryController@index', 'as'=>'adminCateg']  );

Route::get('/admaddctg', ['uses'=>'Admin\CategoryController@create', 'as'=>'adminAddCtg']  );

Route::post('/admsavectg', ['uses'=>'Admin\CategoryController@store', 'as'=>'adminSaveCtg']  );

Route::get('/admshowctg/{id}', ['uses'=>'Admin\CategoryController@show', 'as'=>'adminShowCtg']  );

Route::get('/admDelCtg/{categ}', ['uses'=>'Admin\CategoryController@delete', 'as'=>'adminDelCtg']  );

Route::match(['post','get'],'/admUpdCtg/{categ}', ['uses'=>'Admin\CategoryController@update', 'as'=>'adminUpdCtg']  );

Route::get('/adminn', ['uses'=>'Admin\NewsController@index', 'as'=>'adminNews']  );

Route::get('/admAddNew', ['uses'=>'Admin\NewsController@create', 'as'=>'adminAddNew']  );

Route::post('/admSaveNew', ['uses'=>'Admin\NewsController@store', 'as'=>'adminSaveNew']  );

Route::get('/admDelNew/{news}', ['uses'=>'Admin\NewsController@delete', 'as'=>'adminDelNew']  );

Route::match(['post','get'],'/admUpdNew/{news}', ['uses'=>'Admin\NewsController@update', 'as'=>'adminUpdNew']  );
//обрат связь
Route::get('/contacts', ['uses'=>'News\ContactsController@contacts', 'as'=>'contacts']  );

Route::post('/contactsSave', ['uses'=>'News\ContactsController@store', 'as'=>'contactsSave']  );
//запр.данных
Route::get('/zaprdt', ['uses'=>'News\zaprdtController@zaprdt', 'as'=>'zaprData']  );

Route::post('/zaprdtSave', ['uses'=>'News\zaprdtController@store', 'as'=>'zaprdtSave']  );
//запр.данных админ
Route::get('/adminz', ['uses'=>'Admin\ZdtController@index', 'as'=>'adminZdt']  );
Route::get('/admshowzdt/{id}', ['uses'=>'Admin\ZdtController@show', 'as'=>'adminShowZdt']  );
Route::get('/admDelZdt/{zdt}', ['uses'=>'Admin\ZdtController@delete', 'as'=>'adminDelZdt']  );
Route::match(['post','get'],'/admUpdZdt/{zdt}', ['uses'=>'Admin\ZdtController@update', 'as'=>'adminUpdZdt']  );
//обр.связь
Route::get('/admino', ['uses'=>'Admin\OsvController@index', 'as'=>'adminOsv']  );
Route::get('/admshowosv/{id}', ['uses'=>'Admin\OsvController@show', 'as'=>'adminShowOsv']  );
Route::get('/admDelOsv/{osv}', ['uses'=>'Admin\OsvController@delete', 'as'=>'adminDelOsv']  );
Route::match(['post','get'],'/admUpdOsv/{osv}', ['uses'=>'Admin\OsvController@update', 'as'=>'adminUpdOsv']  );

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