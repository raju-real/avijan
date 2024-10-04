<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminBasicController extends Controller
{
    public function dashboard () {
        return view('admin.dashboard');
    }

    public function logout () {
        Auth::logout();
        Session::reflash();
        return redirect()->route('home');
    }

}
