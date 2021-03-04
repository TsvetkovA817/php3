@extends('news.main')


@section('h1')
   Управление категориями
@endsection 

    
@section('content')  
    @php    
         $categories=[];
         $categories=$arr[0];
         $prevRoute=$arr[1];
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>Список категорий</h2>
       
        <a href="{{ route('adminAddCtg')}}">Добавить категорию</a><br>
        
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
          @forelse($categories as $categoria)   
           <tr>
               <td>{{$categoria->id}}</td>
               <td>{{$categoria->nameKat}}</td>
               <td>{{$categoria->updated_at}}</td>
               <td><a href="{{route('adminShowCtg', $categoria->id)}}">Пр.</a>&nbsp; <a href="">Изм.</a>&nbsp; <a href="">X</a></td>   
               
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
       <hr>
    </div>                 
    
@endsection  

  
