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
            return redirect()->route('users');
        }
        $enrolled_package = auth()
                          ->user()
                          ->load('enrolledPackage')->enrolledPackage;
        if(is_null($enrolled_package))
        {
            return redirect()->route('public.choosePlan');
        }
    }

}
