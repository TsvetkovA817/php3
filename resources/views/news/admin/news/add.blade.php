@extends('news.main')


@section('h1')
   Добавление новости
@endsection


@section('content')

        <a href="{{ route('adminNews')}}">Список новостей</a><br>

   <div><hr><p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae.  </p>



  @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">  {{$error}} </div>
       @endforeach
    @endif
    <hr>
    <form action="{{route('adminSaveNew')}}" method="post">
        @csrf
        <table width="50%" cellspacing="0" cellpadding="4">
        <tr><td align="left" width="100">Категория</td><td align="left"><select class="form-control" name="selctg" id="selctg"> <option >Выбрать</option></select></td></tr>
        <tr>
        <td align="left" width="100">Заголовок новости</td>
        <td align="left">

         @if($errors->has('name'))
            <div class="alert alert-danger">
                    @foreach($errors->get('name') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
          @endif

            <input class="form-control" type="text" placeholder="новость 1" name="name" value="{{old('name')}}" maxlength="50" size="30">

        </td>
        </tr>
        <tr>
        <td align="left" width="100">Описание новости</td>
        <td align="left" width="100">

         @if($errors->has('desc'))
            <div class="alert alert-danger">
                    @foreach($errors->get('desc') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
          @endif
            <textarea class="form-control" rows="5" cols="32" type="text" placeholder="Описание новости" name="desc" >{!! old('desc')!!}</textarea></td>
        </tr>
        <tr><td align="left" width="100">Изображение</td><td align="left"><input class="form-control" type="file" name="image" id="image"></td></tr>
            <tr><td align="left" width="100">Статус</td><td align="left"><select class="form-control" name="selstat" id="selstat"> <option >Выбрать</option></select></td></tr>

        </table>
        <br>
        <button class="form-control" type="submit">Сохранить</button>
    </form>
    <hr>


    </div>




@endsection
