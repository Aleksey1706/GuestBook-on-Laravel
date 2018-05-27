
@section('head')
        <!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Тестовое задание</title>
    <!-- Styles -->
    <link href="/css/new.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
		]) !!};
    </script>
    <script src="/js/app.js"></script>
</head>
@endsection
@yield('head')
<body class="body">
@section('header')
    @if(session()->has('message'))
        <div class="alert">
            <script>alert('{{session()->get('message')}}');</script>
        </div>
    @endif
    <div id="mainmenu">

                    <ul>
          <li><a href="{{ route('home') }}">Вернуться к новостям</a></li>
                        <li><a href="{{ route('admin_add_post_p') }}">Админ панель</a></li>
                        <li> <a href="{{route ('admin_index')}}">Пользователи</a></li>
                        <li> <a href="{{ route('admin_update') }}">Обновление поста</a></li>
                        <li><a href="{{ route('admin_comments') }}">Комментарии</a></li>
                        <li> <a href="{{ route('admin_feeds') }}">Отзывы</a></li>
                    </ul>
                </div>

@endsection
@yield('header')

@section('content')
   <h2>Все пользователи</h2>
    <p>Редактировать пользователя:</p>
    <ul>
        @foreach($users as $user)
            <li>
                <a href="/admin/user/{{$user->id}}">{{$user->name}}</a>
            </li>
        @endforeach
    </ul>
    @endsection
        @yield('content')


</body>
</html>