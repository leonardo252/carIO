<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'CAR I/O')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/business-casual.css')}}" >

        <link rel="stylesheet" href="{{URL::asset('css/fonts1.css')}}" >
        <link rel="stylesheet" href="{{URL::asset('css/fonts2.css')}}" >


    </head>
<body>

    <div class="brand"><h1>CAR I/O</h1><h5>R. | Vitoria 1390  | Fortaleza, CE ----- | 3044-4992</h5></div>
    <!-- <div class="address-bar">1390 R. Vitoria | Fortaleza, CE ----- | 3044-4992</div> -->

    

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/entrada_page">Entrada</a>
                    </li>
                    <li>
                        <a href="/clientes_page">Clientes</a>
                    </li>
                    <li>
                        <a href="/carros_page">Carros</a>
                    </li>
                    <li>
                        <a href="/saida_page">Saida</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            @yield('content')   
        </div>
    </nav>


</body>
</html>
