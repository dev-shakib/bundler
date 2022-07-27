<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Bundle;
use App\Models\Section;
use App\Models\File;
use App\Models\generatedTable;
class BundleController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
         $bundle = Bundle::with('section')->where('user_id',$user->id)->get();
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
        $data['slug'] = preg_replace('/\s+/', '-', $request->name);
        $data['user_id'] = $user->id;
        $bundle = Bundle::create($data);
        $cover['name'] = "Cover Page";
        $cover['bundle_id'] = $bundle->id;
        $cover['user_id'] = $user->id;
        $cover['isDefault'] = 1;
        Section::create($cover);
        $Index['name'] = "Index";
        $Index['bundle_id'] = $bundle->id;
        $Index['user_id'] = $user->id;
        $Index['isDefault'] = 1;
        Section::create($Index);
        return redirect()->route('bundle.show_single', [$bundle->slug,$bundle->id]);
    }
    public function show($slug,$id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        $bundle = Bundle::with('section')->where(['user_id'=>$user->id,"slug"=>$slug,"id"=>$id])->first();
        return view('backend.pages.bundle.show',['bundle'=>$bundle]);
    }
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

         $bundle = Bundle::with('section')->where(['user_id'=>$user->id,"id"=>$id])->first();
        return view('backend.pages.bundle.edit',['bundle'=>$bundle]);
    }
    public function update(Request $request,$id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
        $name = $request->name;
        $slug = preg_replace('/\s+/', '-', $request->name);
        Bundle::where(['user_id'=>$user->id,"id"=>$id])->update(['name'=>$name,'slug'=>$slug]);
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
                if(!is_null($file)){
                    unlink(public_path("pdf/".$file->filename));
                    File::where('id',$file->id)->delete();
                }
                Section::where('id',$s->id)->delete();
            }
            if(generatedTable::where('bundle_id',$b->id)->count() > 0)
            {
               generatedTable::where('bundle_id',$b->id)->delete();
            }
            $bundle->delete();
            return redirect()->back();
        }else{
            dump("no data found");
        }
    }
    public function generated_destroy($id)
    {
        $bundle = generatedTable::with('bundle')->where('id',$id);
        if($bundle->count() > 0)
        {
            $file = $bundle->first();
                unlink(public_path("bundle_pdf/".$file->bundle->name.'/'.$file->filename));
                generatedTable::where('id',$file->id)->delete();
            return redirect()->back();
        }else{
            dump("no data found");
        }
    }
    public function generated_bundle($id)
    {
        $bundle = Bundle::with('generated')->where('id',$id);
        if($bundle->count() > 0)
        {
            $b = $bundle->first();
            return view('backend.pages.bundle.generated_bundle',['bundle'=>$b]);
        }

    }
}
