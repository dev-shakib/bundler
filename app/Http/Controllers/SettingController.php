<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Intervention\Image\ImageManagerStatic as Image;
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
        $set = Setting::where(['user_id'=>$user_id])->get();
        $watermark = Setting::where(['user_id'=>$user_id,'name'=>"watermark"])->first();
        $watermark_setting = Setting::where(['user_id'=>$user_id,'name'=>"watermark_setting"])->first();
        return view("backend.pages.settings.index",['setting'=>$set,'watermark'=>$watermark,'watermark_setting'=>$watermark_setting]);
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
        if($type == "TEXT")
        {
            $setting_name ="watermark";
            $co = Setting::where(['user_id'=>$user_id,'name'=>$setting_name]);
            $value = $value;
        }else if($type == "IMG"){
            $setting_name ="watermark";
            $co = Setting::where(['user_id'=>$user_id,'name'=>$setting_name]);
            if($co->count() > 0)
            {
                $setting = $co->first();
                if($setting->type == "IMG")
                {
                    unlink(public_path('watermark/'.$setting->value));
                }
            }
            if($request->file('values')){
                if (!file_exists(public_path('watermark'))) {
                    mkdir(public_path('watermark'), 0777, true);
                }
                $file= $request->file('values');
                $input['imagename'] = time().'.'.$file->getClientOriginalExtension();

                $destinationPath = public_path('watermark');
                Image::configure(array('driver' => 'gd'));
                $img = Image::make($file->getRealPath())->rotate(45)->save($destinationPath.'/'.$input['imagename']);
                $value = $input['imagename'];
            }
        }else{

            $type = "";
            foreach(auth()->user()->roles as $role)
            {
                $type = $role->slug;
            }
            $setting_name = "watermark_setting";
            $co = Setting::where(['user_id'=>$user_id,'name'=>$setting_name]);
            $value = $value;
        }

        if($co->count() > 0){
             Setting::where(["user_id"=>$user_id,'name'=>$setting_name])->update(['type'=>$type,"name"=>$setting_name,'value'=>$value,"type"=>$type]);
        }else{

            Setting::create(['type'=>$type,"name"=>$setting_name,"type"=>$type,'value'=>$value,"user_id"=>$user_id]);
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
