@extends('news.main')


@section('h1')
   Сообщения обратной связи
@endsection 

    
@section('content')  
    @php    
	
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>Список обращений</h2>
       
        
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
          @forelse($osv as $o)   
           <tr>
               <td>{{$o->id}}</td>
               <td>{{$o->name}}</td>
               <td>{{$o->updated_at}}</td>
               <td><a href="{{route('adminShowOsv', $o->id)}}">Пр.</a>&nbsp; <a href="{{route('adminUpdOsv', $o->id)}} ">Изм.</a>&nbsp; <a href="{{route('adminDelOsv', $o->id)}}">X</a></td>   
               
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
                {{ $osv->links()}}
       <hr>
    </div>                 
    
@endsection  

  
