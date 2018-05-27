@extends('adminPan.main')
@section('content')
    <h2>Добавление новой статьи </h2>
    <div class="col-md-9">
        <div class="add_post">
            <form action="{{ route('admin_add_post_p') }}" method="POST">
                {!! csrf_field() !!}
                <label>Заголовок</label><br>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Заголовок">
                <br><label>Описание</label><br>
                <input type="text" name="description" value="{{ old('description') }}" placeholder="Описание">
                <br><label>Текст</label><br>
                <textarea name="body" rows="10" cols="60">{{ old('body') }}</textarea>
                <br><label>Изображение</label><br>
                <input type="text" value="{{ old('../img') }}" name="img" placeholder="Ссылка на изображение">
                <button type="submit" class="btn">Создать</button>
            </form>
        </div>
    </div>

@endsection