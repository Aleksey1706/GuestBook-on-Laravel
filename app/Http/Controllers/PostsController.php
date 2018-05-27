<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    public function show(Request $request, $id) {
        $article = Articles::all()->where('id', $id)->first();
        $comments = Comment::all()->where('article_id', $article->id)->sortBy("created_at");
        /*dd($comments);*/
        return view('posts', ['title' => $article->name, 'article' => $article,  'comments' => $comments]);
    }

    public function comments(Request $request) {
        $comment = new Comment;
        $comment->comment = $request['comment'];
        $comment->article_id = $request['article_id'];
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->back()->with('message', 'Комментарий добавлен');
    }
}
