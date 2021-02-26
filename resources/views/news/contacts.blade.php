@extends('news.main')


@section('h1')
   Контакты
@endsection 

    
@section('content')  
       

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>Напишите нам</h2>
       
    @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">  {{$error}} </div>
       @endforeach
    @endif
    <hr>
    <form action="{{route('contactsSave')}}" method="post">
        @csrf
        <table width="50%" cellspacing="0" cellpadding="4">
        
        <tr>
        <td align="left" width="100">Имя</td>
        <td align="left"><input type="text" placeholder="Имя" name="fio" value="{{old('fio')}}" maxlength="50" size="30"></td>
        </tr>

        <tr>
        <td align="left" width="100">Емаил</td>
        <td align="left"><input type="email" placeholder="email@mail.com" name="email" value="{{old('email')}}" maxlength="50" size="30"></td>
        </tr>
               
                
        <tr>
        <td align="left" width="100">Заголовок</td>
        <td align="left"><input type="text" placeholder="заголовок 1" name="name" value="{{old('name')}}" maxlength="50" size="30"></td>
        </tr>
        <tr>
        <td align="left" width="100">Сообщение </td>
        <td align="left"><textarea rows="5" cols="32" type="text" placeholder="Сообщение" name="desc" >{!! old('desc')!!}</textarea></td>
        </tr>
        </table>
        <br>
        <button type="submit">Отправить</button>
    </form>
    
    <hr>
        
        

         <hr>
    </div>                 
    
@endsection  

  
