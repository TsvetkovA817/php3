   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.js') }}" defer></script>

    <!-- Scripts (для пагинации и меню Logout)-->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script>-->
    <script type="text/javascript" rel="script" src="{{asset('js/app.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles (страницы Авторизации Laravel)-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        

    <!-- 2 стиль сайта  -->
    <link href=" {{ asset('css/style.css') }}" rel="stylesheet">
    
    @stack('js')
   
        
