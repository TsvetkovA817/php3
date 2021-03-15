@extends('news.main')


@section('h1')
   Редактирование запроса
@endsection



@section('content')

    <a href="{{ route('adminZdt')}}">Список запросов</a><br>

   <div><hr><p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>


    @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">  {{$error}} </div>
       @endforeach
    @endif
    <hr>
    <form action="{{ route('adminUpdZdt', $zdt->id) }}" method="post">
        @csrf
        <table width="50%" cellspacing="0" cellpadding="4">

        <tr>
        <td align="left" width="100">Заказчик</td>
        <td align="left"><input type="text" placeholder="Имя" name="fio" value="{{$zdt->fio }}" maxlength="50" size="30"></td>
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

            <input type="email" placeholder="email@mail.com" name="email" value="{{$zdt->email}}" maxlength="50" size="30"></td>
        </tr>

       <tr>
        <td align="left" width="100">Телефон</td>
        <td align="left"><input type="text" placeholder="+712345678" name="tlf" value="{{$zdt->tlf}}" maxlength="50" size="30"></td>
        </tr>

        <tr>
        <td align="left" width="100">Наименование </td>
        <td align="left">
            @if($errors->has('name'))
            <div class="alert alert-danger">
                    @foreach($errors->get('name') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
            @endif

            <input type="text" placeholder="название 1" name="name" value="{{ $zdt->name }}" maxlength="50" size="30" class="form-control"></td>
        </tr>
        <tr>
        <td align="left" width="100">Запрашиваемые данные </td>
        <td align="left">

          @if($errors->has('desc'))
            <div class="alert alert-danger">
                    @foreach($errors->get('desc') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
          @endif

            <textarea class="form-control" rows="5" cols="32" type="text" placeholder="Описание " name="desc" >{!! $zdt->desc !!}</textarea></td>
        </tr>
        </table>
        <br>
        <button class="form-control" type="submit">Сохранить</button>
    </form>

    <hr>

    </div>


@endsection
