@extends('adminPan.main')
@section('content')

    <form method="POST" action="{{ route('admin_update_post_p') }}">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $article->id }}">
        <br> <label for="name">Заголовок</label><br>
        <input type="text" name="name" value="{{ $article->name }}" placeholder="Заголовок">
        <br><label for="name">Описание</label><br>
        <input type="text" name="description" value="{{ $article->description }}" placeholder="Описание">
        <br><label for="text">Текст</label><br>
        <textarea name="body" rows="10" cols="60">{{ $article->body }}</textarea>
        <br> <label for="img">Изображение</label><br>
        <br> <input type="text" value="{{ $article->img }}" name="img" placeholder="img">
        <button type="submit" class="btn btn-primary">Обновить</button>
        <button type="submit" class="btn" name="delete">Удалить пост</button>
    </form>

@endsection