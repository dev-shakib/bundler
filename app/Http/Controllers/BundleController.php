<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Bundle;
use App\Models\Section;
use App\Models\File;
class BundleController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
         $bundle = Bundle::where('user_id',$user->id)->get();
        return view('backend.pages.bundle.index',['bundle'=>$bundle]);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
        $validated = $request->validate([
        'name' => 'required|max:255',
        ]);
        $data['name'] = $request->name;
        $data['user_id'] = $user->id;
        Bundle::create($data);
        return redirect()->back();
    }
    public function show($id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        $bundle = Bundle::with('section')->where(['user_id'=>$user->id,"id"=>$id])->first();
        return view('backend.pages.bundle.show',['bundle'=>$bundle]);
    }
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        $bundle = Bundle::where(['user_id'=>$user->id,"id"=>$id])->first();
        return view('backend.pages.bundle.edit',['bundle'=>$bundle]);
    }
    public function update(Request $request,$id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
        $name = $request->name;

        Bundle::where(['user_id'=>$user->id,"id"=>$id])->update(['name'=>$name]);
        return redirect()->route('bundle.index');
    }
    public function destroy($id)
    {
        $bundle = Bundle::where('id',$id);
        if($bundle->count() > 0)
        {
            $b = $bundle->first();
            $sec = Section::where('bundle_id',$b->id)->get();
            foreach($sec as $s)
            {
                $file = File::where('section_id',$s->id)->first();
                unlink(public_path($file->filename));
                File::where('id',$file->id)->delete();
                Section::where('id',$s->id)->delete();
            }
            $bundle->delete();
            return redirect()->back();
        }else{
            dump("no data found");
        }
    }
}
