<?php

namespace App\Http\Controllers;
 use App\Message;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GuestsBookController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(2);
        $pagination = $messages->links('pagination.paginaton');
       /*dd($messages);*/
        if (Auth::guest())
            return view('GuestsBook.feed',[ 'messages' => $messages ,'pagination'=>$pagination] );

        return redirect('/');
    }
    public function feed(Request $request)
    {
        $message = new Message();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->messages = $request->input('messages');
       /* dd($request);*/
        $message->save();
        return redirect()->back()->with('message', 'Отзыв  добавлен');
    }
}
