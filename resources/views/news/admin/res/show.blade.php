@extends('news.main')


@section('h1')
   Просмотр выбранного rss канала
@endsection 

    
@section('content')  
   
    @php    
    @endphp
    

   
   <div><hr><p>                    
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam.  </p>
	
           
       <h2>просмотр rss канала</h2>
       
        
       <table class="table table-bordered">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Наименование</th>
                 <th>Дата</th>
                 <th>Описание</th>
                 <th>Статус</th>
                 <th>Ссылка</th>
             </tr>
         </thead>
         <tbody>
           <tr>
               <td>{{$reso->id}}</td>
               <td>{{$reso->cname}}</td>
               <td>{{$reso->updated_at}}</td>
               <td>{!!$reso->cdesc!!}</td>
               <td>{{$reso->cstatus}}</td>
               <td>{{$reso->clink}}</td>
           </tr>
    
         </tbody>
          
       </table>
       <hr>
    <a href="/res">Управление каналами</a><br>       
    </div>                 
    
@endsection    
