                    @php
                      $isAdm=false;
                      if(Auth::check()){
                        $user=Auth::user();
                        if($user->role==1){ 
                         $isAdm=true; }                     
                        //dd($user);
                        }
                    @endphp
                    
                   
                    @if($isAdm)
               
                    <a href="/admin">Аdmin страница</a>
                    
                    @endif
                    
                    <a href="/news">Все Новости</a>
                    <a href="/newsKat">Новости по Категориям</a>
					<a href="/zaprdt">Запрос данных</a>
