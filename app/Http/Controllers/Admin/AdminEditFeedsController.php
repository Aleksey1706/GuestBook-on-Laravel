<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Auth;
use Gate;

class AdminEditFeedsController extends Controller
{
    public function show(Request $request, $id) {
        $users = User::all();
        $messages = Message::find($id);
        if (Auth::user()->id == '2') {
            return view('adminPan.edit_feed', ['messages' => $messages, 'users' => $users]);
        }
        return redirect('/');
    }

    //upd comment
    public function create(Request $request) {
        $this->validate($request, [
            'messages' => 'required|max:254'
        ]);
        ;
        $data = $request;
        $messages = Message::find($data['id']);


        if (isset($data['delete'])) {
            $messages->delete();
            return redirect('/admin/edit/feed')->with('message', 'Отзыв удален');
        }

        $messages->message = $data['messages'];
        $messages->save();
        return redirect()->back()->with('message', 'Отзыв обновлен');

    }
}