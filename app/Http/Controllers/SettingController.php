<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $set = Setting::where(['user_id'=>$user_id,"name"=>"watermark"])->first();
        return view("backend.pages.settings.index",['setting'=>$set]);
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
        $type = $request->type;
        $value = $request->values;
        $user_id = auth()->user()->id;
        $co = Setting::where('user_id',$user_id);
        if($type == "TEXT")
        {
            $value = $value;
        }else{
            if($co->count() > 0)
            {
                $setting = $co->first();
                if($setting->type == "IMG")
                {
                    unlink(public_path('watermark/'.$setting->value));
                }
            }
            if($request->file('values')){
                $file= $request->file('values');
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filename= date('YmdHi').'.'.$extension;
                $file-> move(public_path('watermark'), $filename);
                $value = $filename;
            }
        }

        if($co->count() > 0){
             Setting::where(["user_id"=>$user_id])->update(['type'=>$type,"name"=>"watermark",'value'=>$value,"type"=>$type]);
        }else{

            Setting::create(['type'=>$type,"name"=>"watermark","type"=>$type,'value'=>$value,"user_id"=>$user_id]);
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}