@extends('adminPan.main')
@section('content')

    <h2>Список всех отзывов</h2>
    <p>Отзывы для редактироания </p>
    <ul>
        @foreach($messages as $message)
            <li>
                <a href="feed/{{$message->id}}">{{$message->messages}}</a>
            </li>
        @endforeach
    </ul>
@endsection