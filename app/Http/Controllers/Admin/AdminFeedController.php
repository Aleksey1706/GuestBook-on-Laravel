<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 21.01.2018
 * Time: 15:30
 */

namespace App\Http\Controllers\Admin;

use App\User;
use App\Message;
use Auth;

use App\Http\Controllers\Controller;

class AdminFeedController extends  Controller
{
    public function show() {
        $users = User::all();
        $messages =Message::all()->sortByDesc('created_at');
        if (Auth::user()->id == '2') {
            return view('adminPan.all_feed', [ 'messages' => $messages, 'users' => $users]);
        }
        return redirect('/');
    }
}