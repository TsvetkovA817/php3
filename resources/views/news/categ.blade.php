@extends('news.main')


@section('h1')
     Новости по категориям
@endsection


@section('content')

<div>
   
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo tempora maiores molestias rem, iusto nisi, quasi accusantium quos sunt illo itaque culpa alias reprehenderit. 
    </p>
   
   @php    
           $anews=$arr[0];
           $prevRoute=$arr[1];
   @endphp
    
    @foreach ($anews as $newsK)
        <?php
              $routeName=route('newsOneKat',$newsK->id);
        ?>
        <h2> <a href="{{ $routeName }}"> {{ $newsK->nameKat }} </a> </h2>

        <hr>
    @endforeach

  {{$anews->links()}}

</div>

@endsection

