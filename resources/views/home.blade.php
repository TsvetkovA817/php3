@extends('news.main')

@section('content')
    			
				
        @section('h1')
            Главная страница
        @endsection


        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <div><p>                    
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla minima, ullam eveniet deserunt error unde nesciunt vitae in cupiditate omnis quibusdam? Deleniti quidem beatae, consequuntur cupiditate hic aut sed, nisi laboriosam, accusamus, fuga magnam vel porro id iure dolore in fugit a sit maiores laborum consequatur animi. Voluptatibus autem porro quas doloremque saepe, delectus fugit corporis ab soluta alias, quibusdam error provident vero libero officia recusandae harum at assumenda ea repellat odit, labore hic commodi. Ab amet cumque enim sit, quos perferendis reiciendis sapiente, esse, rerum, obcaecati ipsum nesciunt eum facilis similique ex. Molestias quia ipsa esse commodi dolore, laborum, ullam sed accusamus magnam quam veniam voluptas consequatur modi doloremque unde sit. Eligendi atque dolorum at sunt tempore reiciendis quas quo et, explicabo est provident architecto ex, magnam, nostrum. Ratione voluptates natus debitis molestiae cumque quaerat sint incidunt, praesentium a perspiciatis.   </p>
            </div>                              
				 
				 
      </div>

@endsection
