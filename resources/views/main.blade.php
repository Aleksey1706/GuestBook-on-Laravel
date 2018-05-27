@extends('layouts.site')
@section('content')
    <div class="main_content">
        @foreach($articles as $article)
            <div class="title">{{$article->name}}</div>
            <p class="date">Время публикации: <span>{{$article->created_at}}</span></p>
            <img src="{{$article->img}}">
            <p class="descr">{{$article->description}}</p>
            <div class="btn btn-read"><a href="/post/{{$article->id}}">Узнать больше...</a></div>

        @endforeach
    </div>
    {{$pagination}}
@endsection

