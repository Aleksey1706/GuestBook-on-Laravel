<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Articles;
use Auth;
use Gate;

class AdminEditUser extends Controller {

    public function show(Request $request, $id) {

        $users = User::all();
        $userInfo = User::find($id);
        if (Auth::user()->id == '2') {
            return view('adminPan.edit_user', ['userInfo' => $userInfo, 'users' => $users]);
        }
        return redirect('/');
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'email' => 'required|max:100',
        ]);
        $saving = Auth::user();
        $data = $request;
        $user = User::find($data['id']);



            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            return redirect()->back()->with('message', 'Профиль обновлен');


    }

}