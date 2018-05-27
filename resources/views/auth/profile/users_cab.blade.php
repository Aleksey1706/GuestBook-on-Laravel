@extends('layouts.site')
@section('content')
    <div class="uses_cab">
        <form method="POST" action="{{ route('profile_p') }}">
            {!! csrf_field() !!}
            <h1>Редактирование профиля</h1>
            <p>Зарегестрирован - {{$user->created_at}}</p>
            <p>На сайте уже {{$days}} дней(я)</p>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <label>Имя</label>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Имя">
            <label>E-mail</label>
            <input type="text" name="email" value="{{ $user->email }}" placeholder="E-mail">
            <label>Пароль</label>
            <input type="password" name="password" value="" placeholder="Пароль">
            <button type="submit" class="btn btn-primary">Обновить информацию</button>
        </form>
    </div>
@endsection