@extends('news.main')


@section('h1')
   Запрос данных
@endsection 

    
@section('content')  
    @php    
	
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>Список запросов</h2>
       
        
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
          @forelse($zdt as $z)   
           <tr>
               <td>{{$z->id}}</td>
               <td>{{$z->name}}</td>
               <td>{{$z->updated_at}}</td>
               <td><a href="{{route('adminShowZdt', $z->id)}}">Пр.</a>&nbsp; <a href="{{route('adminUpdZdt', $z->id)}} ">Изм.</a>&nbsp; <a href="{{route('adminDelZdt', $z->id)}}">X</a></td>   
               
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
                {{ $zdt->links()}}
       <hr>
    </div>                 
    
@endsection  

  
