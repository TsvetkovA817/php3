@extends('news.main')


@section('h1')
   Добавление категории
@endsection 

   
    
@section('content')  
   
    <a href="{{ route('adminCateg')}}">Список категорий</a><br>
   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
    
    
    @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">  {{$error}} </div>
       @endforeach
    @endif
    <hr>
    <form action="{{route('adminSaveCtg')}}" method="post">
        @csrf
        <table width="50%" cellspacing="0" cellpadding="4">
        <tr>
        <td align="left" width="100">Наименование категории</td>
        <td align="left"><input type="text" placeholder="категория 1" name="name" value="{{old('name')}}" maxlength="50" size="30" class="form-control"></td>
        </tr>
        <tr>
        <td align="left" width="100">Описание категории</td>
        <td align="left"><textarea class="form-control" rows="5" cols="32" type="text" placeholder="Описание категории" name="desc" >{!! old('desc')!!}</textarea></td>
        </tr>
        </table>
        <br>
        <button class="form-control" type="submit">Сохранить</button>
    </form>
    
    <hr>
    
    </div>                 
    
    
    
@endsection    
