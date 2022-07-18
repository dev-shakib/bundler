<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Bundle;
class BundleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }
         $bundle = Bundle::where('user_id',$user->id)->get();
        return view('pages.user.bundle.index',['bundle'=>$bundle]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }
        $validated = $request->validate([
        'name' => 'required|max:255',
        ]);
        $data['name'] = $request->name;
        $data['user_id'] = $user->id;
        Bundle::create($data);
        return redirect()->route();
    }
    public function show($id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        $bundle = Bundle::with('section')->where(['user_id'=>$user->id,"id"=>$id])->first();
        return view('pages.user.bundle.show',['bundle'=>$bundle]);
    }
}
