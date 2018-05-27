@extends('adminPan.main')
@section('content')
    <h2>Редактирование отзыва</h2>
    <form method="POST" action="{{ route('admin_edit_feed_p') }}">
        {!! csrf_field() !!}
        <input type="hidden" name="id" value="{{ $messages->id }}">
        <label>Текст отзыва:</label>
        <input type="text" name="comment" value="{{ $messages->messages }}" placeholder="Отзыв">
        <button type="submit" class="btn btn-primary">Обновить</button>
        <button type="submit" class="btn" name="delete">Удалить отзыв</button>
    </form>

@endsection