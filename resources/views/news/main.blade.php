<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

   <head>
        @include('news.head')
    </head>
    <body>
       
       @include('news.header')
       
        <div class="flex-center position-ref full-height">

        

            <div class="content">
               
                <div class="title m-b-md">
                    @section('h1') @show
                </div>

                <div class="links">
                   
                    @include('news.menu')
                    
                    @yield('content')
                                       
                </div>
            </div>
        </div>
    
          @include('news.footer')
    
    </body>

</html>
