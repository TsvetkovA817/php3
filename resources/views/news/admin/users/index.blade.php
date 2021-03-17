@extends('news.main')


@section('h1')
   Управление пользователями
@endsection 

    
@section('content')  
    @php    
	
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>Список пользователей</h2>
       
        
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
          @forelse($usersList as $u)   
           <tr>
               <td>{{$u->id}}</td>
               <td>{{$u->name}}</td>
               <td>{{$u->updated_at}}</td>
               <td><a href="{{route('adminShowUsr', $u->id)}}">Пр.</a>&nbsp; <a href="{{route('adminUpdUsr', $u->id)}} ">Изм.</a>&nbsp; <a href="{{route('adminDelUsr', $u->id)}}">X</a></td>   
               
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
                {{ $usersList->links()}}
       <hr>
    </div>                 
    
@endsection  

  
