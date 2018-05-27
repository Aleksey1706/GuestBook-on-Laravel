<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Тестовое задание</title>

    <link href="{{ asset('css/new.css') }}" rel="stylesheet">

{{--
    <script>
        window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
		]) !!};
    </script>--}}
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<div id="mainmenu">
    <ul>
        <li><a href="{{ route('home') }}"><span>Новости</span></a></li>

                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('guests') }}">Гостевая книга</a></li>
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выход
                                        </a></li>

                                    @if(Auth::user()->id == '2' && Auth::user()->email == 'admin@admin.admin')

                                       <li><a href="/admin/add/post">Админ-панель</a></li>
                                    @endif


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endguest

                </ul>

</div>
<body class="body">
@yield('content')


<footer>
    <div class="footer_bottom"><span>Copyright © 2017,    Designed by <a href="https://www.instagram.com/alekseyhens/">Aleksey Hens</a>. </span> </div>
</footer>


</body>
</html>