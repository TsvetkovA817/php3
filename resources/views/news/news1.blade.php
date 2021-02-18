@extends('news.main')

 <?php 
                  $news=$arr[0];
                  $prevRoute=$arr[1];
                  $id=$arr[2];
                  $prevRoute0=$arr[3];
                  $prevRoute2=$arr[2];
                ?>      

@section('h1')
    {{ $news['title'] }}
@endsection


@section('content')

<div>
                   
                    <br><hr><br>
                    <div> {{$news['inform']}}</div>  
                    <br><hr><br>
                    <a href="{{$prevRoute }}"> назад </a> 
                    <a href="{{$prevRoute2 }}"> в категории</a> 

</div>

@endsection




                  