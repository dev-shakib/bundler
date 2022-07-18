<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\File;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        return view('backend.pages.dashboard');
    }

    public function bundle()
    {
        $user = Auth::user();
        $file = File::where('user_id',auth()->user()->id)->get();
        if ($user->isAdmin()) {
            return view('backend.pages.bundle.index');
        }

        return view('backend.pages.bundle.index',['file'=>$file]);
    }
    public function create()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('backend.pages.bundle.create');
        }

        return view('backend.pages.bundle.create');
    }
}
