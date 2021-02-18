@extends('news.main')


@section('h1')
     Все новости
@endsection


@section('content')

<div>
   
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo tempora maiores molestias rem, iusto nisi, quasi accusantium quos sunt illo itaque culpa alias reprehenderit. 
    </p>
   
    <?php    
           $anews=$arr[0];
    ?>
    
    @foreach ($anews as $news)
        <?php   
             $routeName=route('newsOne',$news['id']);
        ?>
        <h2> <a href="{{ $routeName }}"> {{ $news['title'] }} </a> </h2>
        <div> {{ $news['inform'] }}</div>
        <hr>
    @endforeach



</div>

@endsection
