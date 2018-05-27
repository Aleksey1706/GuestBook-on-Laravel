<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Gate;

class AdminController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function show(Request $request) {

        $users = User::all()->except(2)->sortBy('name');
        if (Auth::user()->id == '2') {
            return view('adminPan.main', ['users' => $users]);
        }
        return redirect('/');
    }
}
