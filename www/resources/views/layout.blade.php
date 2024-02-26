<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
{{--    <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">--}}
</head>
<body>
<header>
    <div class=" container-fluid  d-flex justify-content-center  gap-4 p-3 align-items-center mb-7">

            @guest()
                <a class="navbar-brand" href="/"><img src="{{asset('image/logotype.png')}}" class="logo" style="width: 80px;" alt="Логотип"></a>
                <a class="navbar-brand" aria-current="page" href="/">О нас</a>
                <a class="navbar-brand" href="{{route('performances.index')}}">Афиша</a>
                <a class="navbar-brand" href="#">Где нас найти?</a>
                <div class="btn-group" role="group">
                    <a class="btn btn-light" href="{{route('loginPage')}}">Войти</a>
                    <a class="btn btn-light" href="{{route('registrationPage')}}">Зарегистрироваться</a>
                </div>

            @endguest
            @auth()
                    @if(auth()->user()?->isAdmin == 1)
                        <a class="navbar-brand" href="/"><img src="{{asset('image/logotype.png')}}" class="logo" style="width: 80px;" alt="Логотип"></a>
                        <a class="navbar-brand" href="/genres">Жанры</a>
                        <a class="navbar-brand" href="/performances">Спектакли</a>
                    @else
                        <a class="navbar-brand" href="/"><img src="{{asset('image/logotype.png')}}" class="logo" style="width: 80px;" alt="Логотип"></a>
                        <a class="navbar-brand" aria-current="page" href="/">О нас</a>
                        <a class="navbar-brand" href="{{route('performances.index')}}">Афиша</a>
                        <a class="navbar-brand" href="#">Где нас найти?</a>
                    @endif
                    <div class="btn-group" role="group">
{{--                        @if(auth()->user()?->isAdmin == 1)--}}
{{--                            <a class="btn btn-light" href="{{route('admin')}}">АдминПанель</a>--}}
{{--                        @endif--}}
                        @if(auth()->user()?->isAdmin == 0)
                            <a class="btn btn-light" href="">Корзина</a>
                        @endif
                        <a class="btn btn-light" href="{{route('logout')}}">Выйти</a>
                    </div>

            @endauth

    </div>
</header>

@yield('content')


<footer>
    <div class="container d-flex justify-content-center  gap-4 p-5 align-items-center" style="margin-top: 80px">
        <div class="logo">
            <a href="/"><img class="logo"  src="{{asset('image/logotype.png')}}" style="width: 150px"  alt=""></a>
        </div>
        <div class="container-fluid  d-flex justify-content-center  gap-4 align-items-center" style="font-size: 20px">
            @if(auth()->user()?->isAdmin == 1)
                <a class="navbar-brand" href="/genres">Жанры</a>
                <a class="navbar-brand" href="/performances">Спектакли</a>
            @else

                <a class="navbar-brand" href="/performances">Афиша</a>
                <a class="navbar-brand" href="">О нас</a>

                <a class="navbar-brand" href="/contacts">Где нас найти?</a>
            @endif
        </div>
    </div>
</footer>
</body>
</html>
