@extends('news.main')

@php
                  $news=$arr[0];
                  $prevRoute=$arr[1];
                  $id=$arr[2];
                  $prevRoute0=$arr[3];
                  $prevRoute2=$arr[2];
@endphp

@section('h1')
    {{ $news->name }}
@endsection


@section('content')

<div>
                   
                    <br><hr><br>
                    <div> {{ $news->pubDate }}</div><br>  
                    <div> {{ $news->desc }}   </div><br>
                    <div>  <a href="{{ $news->link }}">Читать на яндексе</a> </div>  
                    <br><hr><br>
                    <a href="{{$prevRoute }}"> назад </a><br> 
                    <a href="{{$prevRoute2 }}"> в категории</a> 

</div>

@endsection




                  