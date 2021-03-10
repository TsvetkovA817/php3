@extends('news.main')

 <?php 
                  $prevRoute=$arr[1];
                  $id=$arr[2];
                  $prevRoute0=$arr[3];
                  $anews=$arr[0];
?>    

@section('h1')
     Новости категории {{$id }}
@endsection


@section('content')

<div>
   
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo tempora maiores molestias rem, iusto nisi, quasi accusantium quos sunt illo itaque culpa alias reprehenderit. 
    </p>
   
                      
    
    
    @foreach ($anews as $news)
        
             @if (intval($news->idKat)==intval($id)) 
                 <?php $routeName=route('newsOne',$news->id); ?>
             
             
                  <h2> <a href="{{$routeName }}">  {{$news->title }} </a> </h2>
                       <div> {{$news->inform }}</div>
                       <hr> 
             @endif  
        
    @endforeach

     <a href="{{$prevRoute}}"> назад в категории</a> 
     
     {{$anews->links()}}
     
</div>

@endsection


  