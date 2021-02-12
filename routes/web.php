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
