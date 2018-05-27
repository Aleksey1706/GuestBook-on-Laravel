<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Articles;
use App\User;
use Auth;
use Gate;

class AdminUpdatePostController extends Controller {

    //show Form
    public function show(Request $request, $id) {
        $users = User::all();
        $article = Articles::find($id);
        if (Auth::user()->id == '2') {
            return view('adminPan.update_post', [ 'article' => $article, 'users' => $users]);
        }
        return redirect('/');
    }

    //new post
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:254'
        ]);

        $user = Auth::user();
        $data = $request;
        $article = Articles::find($data['id']);


        if (isset($data['delete'])) {
            $article->delete();
            return redirect('/admin/update/post/')->with('message', 'Материал удален');
        }

        $article->name = $data['name'];
        $article->img = $data['img'];
        $article->body = $data['body'];
        $article->description = $data['description'];
        $res = $user->articles()->save($article);
        return redirect()->back()->with('message', 'Материал обновлен');



    }
}
