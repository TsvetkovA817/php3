@extends('news.main')


@section('h1')
   Добавление канала
@endsection



@section('content')

    <a href="{{ route('res.index')}}">Список каналов</a><br>

   <div><hr><p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>


    @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">  {{$error}} </div>
       @endforeach
    @endif
    <hr>
    <form action="{{route('resStore')}}" method="post">
        @csrf
        <table width="50%" cellspacing="0" cellpadding="4">
        <tr>

        <td align="left" width="100">Наименование </td>
        <td align="left">
          @if($errors->has('cname'))
            <div class="alert alert-danger">
                    @foreach($errors->get('cname') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
          @endif

          <input type="text" placeholder="название" name="cname" value="{{old('cname')}}" maxlength="50" size="30" class="form-control">
        </td>

        </tr>
        <tr>
        <td align="left" width="100">Описание </td>
        <td align="left">

          @if($errors->has('cdesc'))
            <div class="alert alert-danger">
                    @foreach($errors->get('cdesc') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
          @endif

            <textarea class="form-control" rows="5" cols="32" type="text" placeholder="Описание" name="cdesc" >{!! old('cdesc')!!}</textarea>

        </td>
        </tr>
        
        <tr>
        <td align="left" width="100">Ссылка </td>
        <td align="left">
        
        @if($errors->has('clink'))
            <div class="alert alert-danger">
                    @foreach($errors->get('clink') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
            </div>
          @endif

           <input type="text" placeholder="ссылка на канал" name="clink" value="{{ $reso->clink }}" maxlength="50" size="30" class="form-control">

        </td>
        </tr>
        
        <tr>
        <td align="left" width="100">Статус </td>
        <td align="left">
        
           <input type="text" placeholder="1=используется 0=отключен" name="cstatus" value="{{ $reso->cstatus }}" maxlength="50" size="30" class="form-control">

        </td>
        </tr>
        
        </table>
        <br>
        <button class="form-control" type="submit">Сохранить</button>
    </form>

    <hr>

    </div>



@endsection
