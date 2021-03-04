@extends('news.main')


@section('h1')
   Просмотр категории
@endsection 

    
@section('content')  
   
    @php    
         $category=$arr[0];
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>просмотр категории</h2>
       
        
       <table class="table table-bordered">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Наименование</th>
                 <th>Дата</th>
                 <th>Описание</th>
             </tr>
         </thead>
         <tbody>
           <tr>
               <td>{{$category->id}}</td>
               <td>{{$category->name}}</td>
               <td>{{$category->updated_at}}</td>
               <td>{{$category->desc}}</td>
           </tr>
    
         </tbody>
          
       </table>
       <hr>
    <a href="/adminc">Управление Категориями</a><br>       
    </div>                 
    
@endsection    
