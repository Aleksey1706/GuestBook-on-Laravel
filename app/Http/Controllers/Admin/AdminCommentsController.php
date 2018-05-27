<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use Auth;
use Gate;

class AdminCommentsController extends Controller
{
    public function show() {
        $users = User::all();
        $comments = Comment::all()->sortByDesc('created_at');
        if (Auth::user()->id == '2') {
            return view('adminPan.all_comm', ['title' => 'Комментарии', 'comments' => $comments, 'users' => $users]);
        }
        return redirect('/');
    }
}