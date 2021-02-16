<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

               <?php 
                  $prevRoute=$arr[1];
                  $id=$arr[2];
                  $prevRoute0=$arr[3];
                ?>          
               
                <div class="top-right links">
                    
                        <a href="<?= $prevRoute0 ?>">Home</a>
                    
                        <a href="#">Login</a>

                        <a href="#">Register</a>
                        

                </div>


            <div class="content">
                <div class="title m-b-md">
                     Новости категории <?=$id ?>
                </div>

                <div class="links">
                   
                    <a href="/admin">Аdmin страница</a>
                    <a href="/news">Все Новости</a>
                    <a href="/newsKat">Новости по Категориям</a>
                   
                   <?php
    
                    $anews=$arr[0];
                    foreach ($anews as $news){
                      if (intval($news['idKat'])==intval($id)) {    
                       $routeName=route('newsOne',$news['id']);
                    ?>       
                       <h2> <a href="<?=$routeName ?>">  <?=$news['title'] ?> </a> </h2>
                       <div> <?=$news['inform'] ?></div>
                       <hr>    
                    <?php } } ?>
                    <a href="<?=$prevRoute?>"> назад в категории</a> 
                </div>
            </div>
        </div>
    </body>
</html>

