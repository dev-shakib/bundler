<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Models\Section;
use App\Models\File;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
        $validated = $request->validate([
        'bundle_id' => 'required',
        'name' => 'required|max:255',
        ]);
        $data['name'] = $request->name;
        $data['bundle_id'] = $request->bundle_id;
        $data['user_id'] = $user->id;
        Section::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        $section = Section::with('files')->where(['user_id'=>$user->id,"id"=>$id])->first();
        return view('backend.pages.bundle.files.index',['section'=>$section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bundle_id,$id)
    {
         $user = Auth::user();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        $section = Section::where(['user_id'=>$user->id,"id"=>$id])->first();
        return view('backend.pages.bundle.sections.edit',['section'=>$section]);
    }
    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
               Section::where('id',$id)->update(['sort_id'=>$sortOrder]);
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Section::where('id',$id);
        if($section->count() > 0)
        {
            $section->update(['name'=>$request->name]);
            $sec =  $section->first();

            return redirect()->route('bundle.show',[$sec->bundle_id]);

        }else{

            dump("no data found");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $section = Section::where('id',$id);
        if($section->count() > 0)
        {
            $s = $section->first();
            $file = File::where('section_id',$s->id)->first();
            unlink(public_path($file->filename));
            File::where('id',$file->id)->delete();
            $section->delete();
            return redirect()->back();

        }else{

            dump("no data found");
        }
    }
}
