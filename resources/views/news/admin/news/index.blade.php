@extends('news.main')


@section('h1')
   Управление новостями
@endsection 

    
@section('content')  
    @php    
         $news=[];
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
                 <th>Категория</th>
                 <th>Дата</th>
             </tr>
         </thead>
         <tbody>
          @forelse($news as $new)   
           <tr>
               <td>{{$new['id']}}</td>
               <td>{{$new['title']}}</td>
           </tr>
          @empty
             <h3>нет данных</h3>
          @endforelse
         </tbody>
          
       </table>
       <hr>
    </div>                 
    
@endsection  

