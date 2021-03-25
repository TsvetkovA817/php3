@extends('news.main')


@section('h1')
   Админ страница
@endsection 

    
@section('content')  
   
   <div><hr>
    <p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam? Deleniti quidem beatae, consequuntur cupiditate hic aut sed, nisi laboriosam, accusamus, fuga magnam vel porro id iure dolore in fugit a sit maiores laborum consequatur animi. Voluptatibus autem porro quas doloremque saepe, delectus fugit corporis ab soluta alias, quibusdam error provident vero libero officia recusandae harum at assumenda ea repellat odit, labore hic commodi. Ab amet cumque enim sit, quos perferendis reiciendis sapiente, esse, rerum, obcaecati ipsum nesciunt eum facilis similique ex.  </p>
    <br>
    <a href="/adminc">Управление Категориями</a><br>
    <a href="/adminn">Управление Новостями</a><br>
	<a href="/adminz">Управление запросами данных</a><br>
	<a href="/admino">Управление обратной связью</a><br>
    <a href="/adminu">Управление пользователями</a><br>
    <a href="/parser/1">Новости с яндекса: Армия  - Импорт в БД</a><br>
    <a href="/parser/2">Новости с яндекса: Музыка - Импорт в БД</a><br>
    <a href="/parser/3">Новости с яндекса: Авто   - Импорт в БД</a><br>
    <a href="/parser10">Группа Новостей с яндекса: Парсер1 без очереди - Импорт в файл</a><br>
    <a href="/parser12">Группа Новостей с яндекса: Парсер2 с очередью  - Импорт в файл</a><br>
    <a href="/parser13">Группа Новостей из таблицы resourses: Парсер3 с очередью  - Импорт в файл</a><br>
    <a href="/res">Управление rss-каналами (таблица resources)</a><br><br>
    <hr>
    </div>                 
    
    
@endsection    
