@extends('news.main')


@section('h1')
   Редактирование новости
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
    <form action="{{route('adminUpdNew',$news->id)}}" method="post">
        @csrf
        <table width="90%" cellspacing="0" cellpadding="4">



        <tr><td align="left" width="100">Категория</td><td align="left">
         <select class="form-control" name="idk" id="selctg">
          @foreach($categories as $category)
            <option value="{{$category->id}}" {{ $news->idk==$category->id ? 'selected' : ''  }}> {{$category->name}}</option>
          @endforeach
         </select>
        </td></tr>

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

          <input class="form-control" type="text" placeholder="новость 1" name="name" value="{!!$news->name!!}" maxlength="60" size="50">

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
          
<!--          <textarea  class="form-control" rows="5" cols="32" type="text" placeholder="Описание новости" name="desc" >{!! $news->desc !!}</textarea></td>-->
        
         <textarea  id="editor4" name="desc" >{!! $news->desc !!}</textarea>
          <script type="text/javascript"> 
             var options = {
                 filebrowserImageBrowserUrl: '/laravel-filemanager?type=Images',
                 filebrowserImageUploadUrl:  '/laravel-filemanager/upload?type=Images&_token=',
                 filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                 filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
             };  
             CKEDITOR.replace('editor4',options);
          </script>  
        </tr>
        <tr><td align="left" width="100">Изображение</td><td align="left"><input class="form-control" type="file" name="image" id="image"></td></tr>
            <tr><td align="left" width="100">Статус</td><td align="left"><select class="form-control" name="selstat" id="selstat"> <option >Выбрать</option></select></td></tr>

        
        <tr>
        <td align="left" width="100">Ссылка на источнике</td>
        <td align="left" >
          <input class="form-control" type="text" placeholder="ссылка" name="link" value="{{$news->link}}" maxlength="250" size="60">
        </td>
        </tr>

        <tr>
        <td align="left" width="100">Дата публикации</td>
        <td align="left">
          <input class="form-control" type="text" placeholder="Дата" name="pubDate" value="{{$news->pubDate}}" maxlength="50" size="60">
        </td>
        </tr>
        
        
        <tr><td align="left" width="100">Источник новости</td><td align="left">
         <select class="form-control" name="idsrc" id="selsrcn">
          @foreach($srcn as $s)
            <option value="{{$s->id}}" {{ $news->idsrc==$s->id ? 'selected' : ''  }}> {{$s->name}}</option>
          @endforeach
         </select>
         </td></tr>

        </table>
        
    
               
        <br>
        <button class="form-control" type="submit">Сохранить</button>
    </form>
    <hr>


    </div>

  
    
  

@endsection

@push('js')



<!--<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>-->
 
 <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js" type="text/javascript"></script>
  
<!--  
   <script type="text/javascript">
    ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
            console.error( error );
        } );
       
    
</script>
   -->
           

@endpush

