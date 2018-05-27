<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Tag;
use App\Articles;
use App\Category;
use Auth;
use Gate;

class AdminPostController extends Controller {

    //show Form
    public function show() {
        $users = User::all();
        if (Auth::user()->id == '2') {
            return view('adminPan.add_post', ['users' => $users]);
        }
        return redirect('/');
    }

    //new post
    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required'
        ]);


        $user = Auth::user();
        $data = $request->all();
        $article = $user->articles()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'img' => $data['img'],
            'body' => $data['body'],


        ]);




        return redirect()->back()->with('message', 'Пост добавлен');
    }

}
