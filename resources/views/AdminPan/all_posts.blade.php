@extends('adminPan.main')
@section('content')

    <h2>Список всех постов</h2>

    <ul>
        @foreach($articles as $article)
            <li>
                <a href="/admin/update/post/{{$article->id}}">{{$article->name}}</a>
            </li>
        @endforeach
    </ul>
@endsection