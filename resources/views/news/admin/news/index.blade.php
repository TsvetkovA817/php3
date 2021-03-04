@extends('news.main')


@section('h1')
   Управление новостями
@endsection 

    
@section('content')  
    @php    
         $news=$arr[0];
         $prevRoute=$arr[1];
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
      
      
       <h2>Список новостей</h2>
       
        <a href="{{ route('adminAddNew')}}">Добавить новость</a><br>
        
       <table>
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Наименование</th>
                 <th>ИД Категория</th>
                 <th>Категория</th>
                 <th>Дата</th>
                 <th>Управление</th>
             </tr>
         </thead>
         <tbody>
          @forelse($news as $n) 
         
           <tr>
             <td>{{$n->id}}</td>
             <td>{{$n->title}}</td>               
             <td>{{$n->idKat}}</td>
             <td>{{$n->nameKat}}</td>
             <td>{{$n->updated_at}}</td>
             <td><a href="">Изм.</a>&nbsp; <a href="">X</a></td>
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
       <hr>
    </div>                 
    
@endsection  

