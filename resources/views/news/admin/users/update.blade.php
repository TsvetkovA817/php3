@extends('news.main')


@section('h1')
   Редактирование пользователя
@endsection 

   
    
@section('content')  
   
    <a href="{{ route('adminUsr')}}">Список пользователей</a><br>
   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
    
    
    @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">  {{$error}} </div>
       @endforeach
    @endif
    <hr>
    <form action="{{ route('adminUpdUsr', $user->id) }}" method="post">
        @csrf
        <table width="50%" cellspacing="0" cellpadding="4">
        <tr>
        <td align="left" width="100">Наименование </td>
        <td align="left"><input type="text" placeholder="название 1" name="name" value="{{ $user->name }}" maxlength="50" size="30" class="form-control"></td>
        </tr>
        
        <tr>
        <td align="left" width="100">Емаил</td>
        <td align="left">

           @if($errors->has('email'))
            <div class="alert alert-danger">
                    @foreach($errors->get('email') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
           @endif

            <input type="email" placeholder="email@mail.com" name="email" value="{{$user->email}}" maxlength="50" size="30"></td>
        </tr>

        <tr>
        <td align="left" width="100">Роль</td>
        <td align="left">

           @if($errors->has('integer'))
            <div class="alert alert-danger">
                    @foreach($errors->get('integer') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
           @endif

            <input type="text" placeholder="0=юзер/1=адм" name="role" value="{{$user->role}}" maxlength="50" size="30"></td>
        </tr>

                       
        <tr>
        <td align="left" width="100">Новый пароль</td>
        <td align="left">

           @if($errors->has('password'))
            <div class="alert alert-danger">
                    @foreach($errors->get('password') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
           @endif

            <input type="password" placeholder="Пароль" name="password"  maxlength="50" size="30"></td>
        </tr>

        <tr>
        <td align="left" width="100">Подтвердить Пароль </td>
        <td align="left">

           @if($errors->has('password2'))
            <div class="alert alert-danger">
                    @foreach($errors->get('password2') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
           @endif

            <input type="password" placeholder="Пароль еще раз" name="password2"  maxlength="50" size="30"></td>
        </tr>
                                                                              
                        
        </table>
        <br>
        <button class="form-control" type="submit">Сохранить</button>
    </form>
    
    <hr>
    
    </div>                 
    
    
    
@endsection    
