@extends('GuestsBook.main')
@section('content')
       <h1>Отзывы</h1>
       <div class="feedback">
        @foreach($messages as $message)
                <p class="name"> <h3><span>{{ $message->name }}</span></h3> <br>в <span>{{$message->created_at}}</span> добавил отзыв:</p>
                <p class="message"><h4>{{$message->messages}} </h4> </p><hr>
    @endforeach
       </div>
        <p>Ваш отзыв:</p>
        <form action="{{route('guests_c')}}" method="POST">
            {!! csrf_field() !!}
    <div id="feed" >
        <label for="name">Имя:</label>
        <input  placeholder="Имя" name="name" type="text" id="name">
    </div>

    <div id="feed">
        <label for="email">E-mail:</label>
        <input  placeholder="E-mail" name="email" type="email" id="email">
    </div>

    <div id="feed">
        <label for="messages">Отзыв:</label><br>
        <textarea  rows="5" placeholder="Текст сообщения" name="messages" cols="50"
                  id="message"></textarea>
    </div>

    <div id="feed" >
        <input  type="submit" value="Добавить">
    </div>
        </form>
    {{$pagination}}
@endsection