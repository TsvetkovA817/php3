@extends('news.main')


@section('h1')
   Управление каналами новостей 
@endsection 

    
@section('content')  
    @php    
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>Список каналов rss</h2>
       
        <a href="{{ route('resAdd')}}">Добавить запись</a><br>
        
       <table class="table table-bordered">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Наименование</th>
                 <th>Дата</th>
                 <th>Управление</th>
             </tr>
         </thead>
         <tbody>
          @forelse($reso as $r)   
           <tr>
               <td>{{$r->id}}</td>
               <td>{{$r->cname}}</td>
               <td>{{$r->updated_at}}</td>
               <td><a href="{{route('resShow', $r->id)}}">Пр.</a>&nbsp; <a href="{{route('resEdit', $r->id)}} ">Изм.</a>&nbsp; <a href="{{route('resDel', $r->id)}}">X</a></td>   
               
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
        {{ $reso->links()}}
       <hr>
    </div>                 
    
@endsection  

  
