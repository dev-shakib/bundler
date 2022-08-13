<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\File;
use App\Models\Section;
use App\Models\generatedTable;
use App\Models\Setting;
use App\Models\Bundle;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Carbon\Carbon;
use ZipArchive;
use Image;
use NPDF;
use Auth;
use Storage;
use File as Files;
use Session;
use MPDF;
use setasign\Fpdi\Fpdi;
use App\Http\Helpers\PPDF;

class DocumentController extends Controller
{

    public function delete($id)
    {
        $file = File::where('id',$id);
        if($file->count() > 0)
        {
            $file = $file->first();
            if(file_exists(public_path("pdf/".$file->filename))){
                unlink(public_path('pdf/'.$file->filename));
            }
            $file->delete();
            return redirect()->back();
        }
    }
    public function show($bundle_id,$section_id,$id)
    {

        $file = File::with(['section','bundle'])->where('id',$id);
        if($file->count() > 0)
        {
            $file = $file->first();
            return view('backend.pages.bundle.files.show',['file'=>$file,'bundle_id'=>$bundle_id,'section_id'=>$section_id,'file_id'=>$id]);
        }
        return redirect()->back();
    }
    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
               File::where('id',$id)->update(['sort_id'=>$sortOrder]);
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
     public function packages()
    {
        $enrolled_package = auth()
        ->user()
        ->load('enrolledPackage')->enrolledPackage;
          if($enrolled_package->package_id == 1){
                 $admin_setting = Setting::where(['type'=>"admin",'name'=>"watermark_setting"])->first();
                if(!is_null($admin_setting) && $admin_setting->value == 1){
                    $settings = Setting::where(['name'=>"watermark",'user_id'=>"1"])->first();
                    if(!is_null($settings)){
                        if($settings->type == "IMG")
                        {
                            return $config = ['instanceConfigurator' => function($pdf) use ($settings) {
                                $pdf->SetWatermarkImage(public_path('watermark/'.$settings->value));
                                $pdf->showWatermarkImage  = true;
                            }];
                        }else{
                            return $config = ['instanceConfigurator' => function($pdf) use ($settings) {
                                $pdf->SetWatermarkText($settings->value);
                                $pdf->showWatermarkText  = true;
                            }];
                        }

                    }else{
                        return $config = ['instanceConfigurator' => function($pdf) use ($settings) {
                                $pdf->SetWatermarkText(env('APP_NAME'));
                                $pdf->showWatermarkText  = true;
                            }];
                    }
                }else{
                    return $config = ['instanceConfigurator' => function($pdf) {
                                $pdf->SetWatermarkText(env('APP_NAME'));
                                $pdf->showWatermarkText  = true;
                            }];
                }
            }elseif($enrolled_package->package_id == 3){
                $settings_watermark = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark_setting"]);
                if($settings_watermark->count() > 0)
                {
                    $settings_watermark = $settings_watermark->first();
                }else{
                    $settings_watermark->value = 0;
                }
                if($settings_watermark->value == 1)
                {
                    $settings = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark"])->first();
                    if(!is_null($settings)){
                        $text = $settings->value;
                    }else{
                        $text =env('APP_NAME');
                    }
                    if(!is_null($settings)){
                        if($settings->type == "TEXT"){
                            return $config = ['instanceConfigurator' => function($pdf) use ($settings) {
                                $pdf->SetWatermarkText($settings->value);
                                $pdf->showWatermarkText  = true;
                            }];
                        }else{
                            return $config = ['instanceConfigurator' => function($pdf) use ($settings) {
                                $pdf->SetWatermarkImage(public_path('watermark/'.$settings->value));
                                $pdf->showWatermarkImage  = true;
                            }];
                        }
                    }else{
                       return $config = ['instanceConfigurator' => function($pdf) {
                                $pdf->SetWatermarkText(env('APP_NAME'));
                                $pdf->showWatermarkText  = false;
                            }];

                    }
                }else{
                    return $config = ['instanceConfigurator' => function($pdf) {
                        $pdf->SetWatermarkText(env('APP_NAME'));
                        $pdf->showWatermarkText  = false;
                    }];
                }
            }else{
                  return $config = ['instanceConfigurator' => function($pdf) {
                        $pdf->SetWatermarkText(env('APP_NAME'));
                        $pdf->showWatermarkText  = false;
                    }];
            }
    }
    public function rename(Request $request)
    {
        $name = $request->name;
        $id = $request->file_id;
        $file = File::where('id',$id);
        if($file->count() == 0){
            return abort(404);
        }
        File::where('id',$id)->update(['name'=>$name]);
        $file =$file->first();

        return redirect()->route('section.show', [$file->section_id]);
    }
    public function update(Request $request)
    {
        if (!file_exists(storage_path('app/public/files'))) {
            mkdir(storage_path('app/public/files'), 0777, true);
        }
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
       $filename =$file->storeAs('public/files', $filename);
        $bundle_id= $request->bundle_id;
        $section_id= $request->section_id;
        $file_id= $request->file_id;
        $filess = File::where('id',$file_id);
        if($filess->count() > 0){
            $filess = $filess->first();
            unlink(public_path('pdf/'.$filess->filename));
            $filename = explode('/',$filename);
            $splitName = explode('.',  $filename[2]);

            if($splitName[1] == "docx" || $splitName[1] == "doc" || $splitName[1] == "dot")
            {
                $domPdfPath = base_path('vendor/dompdf/dompdf');
                \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
                \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

                //Load word file
                $Content = \PhpOffice\PhpWord\IOFactory::load(storage_path("app/public/files/".$filename[2]));

                //Save it into PDF
                 $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'HTML');
             if (!file_exists(public_path('../resources/views/pdf'))) {
                mkdir(public_path('../resources/views/pdf'), 0777, true);
            }
            $PDFWriter->save(public_path('../resources/views/pdf/'. $splitName[0].'.blade.php'));

            $view['view'] = view('pdf.'.$splitName[0])->render();


            $pdf = MPDF::loadHtml(view('newDocsPdf', $view),$this->packages());
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(storage_path("app/public/files/".$filename[2]));
            unlink(public_path("../resources/views/pdf/".$splitName[0].'.blade.php'));

            }else if($splitName[1] == "jpe" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
            {
                $data['image'] = [$filename[2]];


                $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
                   unlink(storage_path("app/public/files/".$filename[2]));
            }else{

            $enrolled_package = auth()
            ->user()
            ->load('enrolledPackage')->enrolledPackage;
            $sourcePath=storage_path("app/public/files/".$filename[2]);
            $mpdf = new \Mpdf\Mpdf();

            // Specify a PDF template
            $pagecount = $mpdf->SetSourceFile($sourcePath);

            for($i=1;$i<=$pagecount;$i++){
                    $mpdf->AddPage();
                    $import_page = $mpdf->ImportPage($i);
                    $mpdf->UseTemplate($import_page);


                    if($enrolled_package->package_id == 1){
                        $admin_setting = Setting::where(['type'=>"admin",'name'=>"watermark_setting"])->first();
                        if(!is_null($admin_setting) && $admin_setting->value == 1){
                            $settings = Setting::where(['name'=>"watermark",'user_id'=>"1"])->first();
                            if(!is_null($settings)){
                                if($settings->type == "IMG")
                                {
                                    $mpdf->SetWatermarkImage(public_path('watermark/'.$settings->value));
                                    $mpdf->showWatermarkImage  = true;
                                }else{
                                    $mpdf->SetWatermarkText($settings->value);
                                    $mpdf->showWatermarkText  = true;
                                }

                            }else{
                                $mpdf->SetWatermarkText(env('APP_NAME'));
                                $mpdf->showWatermarkText  = true;
                            }
                        }else{
                            $mpdf->SetWatermarkText(env('APP_NAME'));
                            $mpdf->showWatermarkText  = true;
                        }
                    }elseif($enrolled_package->package_id == 3){
                        $settings_watermark = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark_setting"]);
                        if($settings_watermark->count() > 0)
                        {
                            $settings_watermark = $settings_watermark->first();
                        }else{
                            $settings_watermark->value = 0;
                        }
                        if($settings_watermark->value == 1)
                        {
                            $settings = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark"])->first();
                            if(!is_null($settings)){
                                $text = $settings->value;
                            }else{
                                $text =env('APP_NAME');
                            }
                            if(!is_null($settings)){
                                if($settings->type == "TEXT"){
                                    $mpdf->SetWatermarkText($settings->value);
                                    $mpdf->showWatermarkText  = true;
                                }else{
                                    $mpdf->SetWatermarkImage(public_path('watermark/'.$settings->value));
                                    $mpdf->showWatermarkImage  = true;
                                }
                            }else{
                                $mpdf->SetWatermarkText(env('APP_NAME'));
                                $mpdf->showWatermarkText  = false;

                            }
                        }else{
                            $mpdf->SetWatermarkText(env('APP_NAME'));
                            $mpdf->showWatermarkText  = true;
                        }
                    }else{
                        $mpdf->SetWatermarkText(env('APP_NAME'));
                        $mpdf->showWatermarkText  = false;
                    }

            }


            $mpdf->output($sourcePath,\Mpdf\Output\Destination::FILE);
            $destinationPath=public_path('pdf/'.$filename[2]);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }



        }
            $path = public_path('pdf/'.$splitName[0].'.pdf');
            $totalPage = $this->countPages($path);
            $enrolled_package = auth()
                          ->user()
                          ->load('enrolledPackage')->enrolledPackage;
            if($enrolled_package->package_id == 1)
            {
                $days_after_file_delete = 100;
            }elseif($enrolled_package->package_id == 2)
            {
                $days_after_file_delete = 730;
            }else{
                $days_after_file_delete = 1095;
            }
            $auto_delete_date = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d');
            $filess = File::where("id",$file_id)->orderBy("sort_id",'desc')->first();
            if(!is_null($filess))
            {
                $sort_id = $filess->sort_id+1;
            }else{
                $sort_id = 1;
            }
            File::where('id',$file_id)->update(['filename'=>$splitName[0].'.pdf','name'=>$splitName[0],'sort_id'=>$sort_id,'auto_deleted_at'=>$auto_delete_date, 'totalPage'=>$totalPage,'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);

            return response()->json(['success'=>$splitName[0].'.pdf']);

        }
    }

    public function uploadDocuments(Request $request)
    {

        if (!file_exists(storage_path('app/public/files'))) {
            mkdir(storage_path('app/public/files'), 0777, true);
        }
        if (!file_exists(public_path('pdf'))) {
            mkdir(public_path('pdf'), 0777, true);
        }
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $filename =$file->storeAs('public/files', $filename);
        $bundle_id= $request->bundle_id;
        $section_id= $request->section_id;
        $filename = explode('/',$filename);
        $splitName = explode('.',  $filename[2]);

        if($splitName[1] == "docx" || $splitName[1] == "doc" || $splitName[1] == "dot")
        {
            $domPdfPath = base_path('vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

            //Load word file
            $Content = \PhpOffice\PhpWord\IOFactory::load(storage_path("app/public/files/".$filename[2]));


            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'HTML');
             if (!file_exists(public_path('../resources/views/pdf'))) {
                mkdir(public_path('../resources/views/pdf'), 0777, true);
            }
            $PDFWriter->save(public_path('../resources/views/pdf/'. $splitName[0].'.blade.php'));

            $view['view'] = view('pdf.'.$splitName[0])->render();
            $view['view'] = str_replace("PHPWord","",$view['view']);

            $pdf = MPDF::loadHtml(view('newDocsPdf', $view),$this->packages());
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(storage_path("app/public/files/".$filename[2]));
            unlink(public_path("../resources/views/pdf/".$splitName[0].'.blade.php'));

        }else if($splitName[1] == "jpg" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
        {
            $image = [$filename[2]];

            $pdf = MPDF::loadHtml(view('imgPdf', compact('image')),$this->packages());
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(storage_path("app/public/files/".$filename[2]));
        }else{
            $enrolled_package = auth()
            ->user()
            ->load('enrolledPackage')->enrolledPackage;
            $sourcePath=storage_path("app/public/files/".$filename[2]);
            $mpdf = new \Mpdf\Mpdf();


            // Specify a PDF template
            $pagecount = $mpdf->SetSourceFile($sourcePath);

            for($i=1;$i<=$pagecount;$i++){
                    $mpdf->AddPage();
                    $import_page = $mpdf->ImportPage($i);
                    $mpdf->UseTemplate($import_page);


                    if($enrolled_package->package_id == 1){
                        $admin_setting = Setting::where(['type'=>"admin",'name'=>"watermark_setting"])->first();
                        if(!is_null($admin_setting) && $admin_setting->value == 1){
                            $settings = Setting::where(['name'=>"watermark",'user_id'=>"1"])->first();
                            if(!is_null($settings)){
                                if($settings->type == "IMG")
                                {
                                    $mpdf->SetWatermarkImage(public_path('watermark/'.$settings->value));
                                    $mpdf->showWatermarkImage  = true;
                                }else{
                                    $mpdf->SetWatermarkText($settings->value);
                                    $mpdf->showWatermarkText  = true;
                                }

                            }else{
                                $mpdf->SetWatermarkText(env('APP_NAME'));
                                $mpdf->showWatermarkText  = true;
                            }
                        }else{
                            $mpdf->SetWatermarkText(env('APP_NAME'));
                            $mpdf->showWatermarkText  = true;
                        }
                    }elseif($enrolled_package->package_id == 3){
                        $settings_watermark = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark_setting"]);
                        if($settings_watermark->count() > 0)
                        {
                            $settings_watermark = $settings_watermark->first();
                        }else{
                            $settings_watermark->value = 0;
                        }
                        if($settings_watermark->value == 1)
                        {
                            $settings = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark"])->first();
                            if(!is_null($settings)){
                                $text = $settings->value;
                            }else{
                                $text =env('APP_NAME');
                            }
                            if(!is_null($settings)){
                                if($settings->type == "TEXT"){
                                    $mpdf->SetWatermarkText($settings->value);
                                    $mpdf->showWatermarkText  = true;
                                }else{
                                    $mpdf->SetWatermarkImage(public_path('watermark/'.$settings->value));
                                    $mpdf->showWatermarkImage  = true;
                                }
                            }else{
                                $mpdf->SetWatermarkText(env('APP_NAME'));
                                $mpdf->showWatermarkText  = false;

                            }
                        }else{
                            $mpdf->SetWatermarkText(env('APP_NAME'));
                            $mpdf->showWatermarkText  = true;
                        }
                    }else{
                        $mpdf->SetWatermarkText(env('APP_NAME'));
                        $mpdf->showWatermarkText  = false;
                    }

            }
            $mpdf->output($sourcePath,\Mpdf\Output\Destination::FILE);
            $destinationPath=public_path('pdf/'.$filename[2]);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }

        }
        $path = public_path('pdf/'.$splitName[0].'.pdf');
        $totalPage = $this->countPages($path);
        $enrolled_package = auth()
                          ->user()
                          ->load('enrolledPackage')->enrolledPackage;
        if($enrolled_package->package_id == 1)
        {
            $days_after_file_delete = 100;
        }elseif($enrolled_package->package_id == 2)
        {
            $days_after_file_delete = 730;
        }else{
            $days_after_file_delete = 1095;
        }
         $auto_delete_date = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d');
         $filess = File::where("section_id",$section_id)->orderBy("sort_id",'desc')->first();
         if(!is_null($filess))
         {
            $sort_id = $filess->sort_id+1;
         }else{
            $sort_id = 1;
         }
        File::create(['filename'=>$splitName[0].'.pdf','sort_id'=>$sort_id,"name"=>$splitName[0],'auto_deleted_at'=>$auto_delete_date,'totalPage'=>$totalPage,'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
        return response()->json(['success'=>$splitName[0].'.pdf']);
    }
    public function create($bundle_id,$section_id)
    {
        $user = Auth::user();
        $section = Section::with(['bundle'])->where('user_id',auth()->user()->id)->where(['bundle_id'=>$bundle_id,'id'=>$section_id])->first();

        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
        return view('backend.pages.bundle.files.create',['section'=>$section,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
    }
    public function generate($bundle_id)
    {
        $files = File::where(["user_id"=>auth()->user()->id,'bundle_id'=>$bundle_id])->get();
        $sections = Section::with('files')->where('bundle_id',$bundle_id)->orderBy('sort_id','ASC')->get();
        
        $pdf = PDFMerger::init();
        foreach($sections as $sec)
        {
            if (!file_exists(public_path('pdf'))) {
                mkdir(public_path('pdf'), 0777, true);
            }
            if($sec->isDefault == 1){
                if($sec->isMainSection == 1)
                {
                    $cpdf = MPDF::loadHtml(view('MainindexPdf', compact('sec')),$this->packages());
                    $output=$cpdf->output();
                    file_put_contents('pdf/section'.$sec->id.'.pdf', $output);
                    $pdf->addPDF(public_path('pdf/section'.$sec->id.'.pdf'), 'all');
                }else{
                    if($sec->name == "Index")
                    {
                        $allsections = Section::with('files')->where('bundle_id',$bundle_id)->orderBy('sort_id','ASC')->get();
                        $heading = "INDEX";
                        $cpdf = MPDF::loadHtml(view('indexAllPdf', compact('allsections','heading')),$this->packages());
                        $output=$cpdf->output();
                        file_put_contents('pdf/section'.$sec->id.'.pdf', $output);
                        $pdf->addPDF(public_path('pdf/section'.$sec->id.'.pdf'), 'all');
                    }else{
                        $allsections = Section::with('files')->where('id',$sec->id)->orderBy('sort_id','ASC')->get();
                        $heading = $sec->name ."<br> INDEX";
                        $cpdf = MPDF::loadHtml(view('indexAllPdf', compact('allsections','heading')),$this->packages());
                        $output=$cpdf->output();
                        file_put_contents('pdf/section'.$sec->id.'.pdf', $output);
                        $pdf->addPDF(public_path('pdf/section'.$sec->id.'.pdf'), 'all');
                    }
                }
            }else{
                    $allsections = Section::with('files')->where('id',$sec->id)->orderBy('sort_id','ASC')->get();
                    $heading = $sec->name ."<br> INDEX";
                    $cpdf = MPDF::loadHtml(view('indexAllPdf', compact('allsections','heading')),$this->packages());
                    $output=$cpdf->output();
                    file_put_contents('pdf/section'.$sec->id.'.pdf', $output);
                    $pdf->addPDF(public_path('pdf/section'.$sec->id.'.pdf'), 'all');
            }
            foreach($sec->files as $f){
                $pdf->addPDF(public_path("pdf/".$f->filename), 'all');
            }
        }
        $bundle = Bundle::where("id",$bundle_id)->first();
        $fileName = $bundle->name.'.pdf';
        $pdf->merge();
         if (!file_exists(public_path('generated_pdf'))) {
                mkdir(public_path('generated_pdf'), 0777, true);
            }

        $pdf->save(public_path('generated_pdf/'.$fileName));

        $this->pdfPageNumbering($fileName);
        Session::flash('message', 'Bundle Generated Successfully');
        $enrolled_package = auth()
                          ->user()
                          ->load('enrolledPackage')->enrolledPackage;
        if($enrolled_package->package_id == 1)
            {
                $days_after_file_delete = 100;
            }elseif($enrolled_package->package_id == 2)
            {
                $days_after_file_delete = 730;
            }else{
                $days_after_file_delete = 1095;
            }
            $auto_delete_date = Carbon::now()->addDays($days_after_file_delete)->format('Y-m-d');
        $generated_table = generatedTable::where("bundle_id",$bundle_id)->count();
        if($generated_table > 0)
        {
            generatedTable::where('bundle_id',$bundle_id)->update(['auto_deleted_at'=>$auto_delete_date,'filename'=>$fileName,'paid'=>1]);
        }else{

            generatedTable::create(['bundle_id'=>$bundle_id,'auto_deleted_at'=>$auto_delete_date,'filename'=>$fileName,'paid'=>1]);
        }

        return redirect()->back();
    }



    public function countPages($path) {
        $pdftext = file_get_contents($path);
        $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
        return $num;
    }
    //setWaterMark

    public function watermark($id){
        // Source file and watermark config

        $enrolled_package = auth()
        ->user()
        ->load('enrolledPackage')->enrolledPackage;
        $generated_pdf = generatedTable::where("id",$id)->first();
        $file = public_path('generated_pdf/'.$generated_pdf->filename);
        $bundle = Bundle::where("id",$generated_pdf->bundle_id)->first();
        if (!file_exists(public_path('bundle_pdf'))) {
                mkdir(public_path('bundle_pdf'), 0777, true);
            }
        if (!file_exists(public_path('bundle_pdf/'.$bundle->name))) {
                mkdir(public_path('bundle_pdf/'.$bundle->name), 0777, true);
            }
        if (!file_exists(public_path('bundle_zip'))) {
                mkdir(public_path('bundle_zip'), 0777, true);
            }
            $sourcePath=$file;
            $destinationPath=public_path('bundle_pdf/'.$bundle->name.'/'.$generated_pdf->filename);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }
        if (!file_exists(public_path('bundle_zip/'.$bundle->name.'.zip'))) {
            touch(public_path('bundle_zip/'.$bundle->name.'.zip'), strtotime('-1 days'));
        }
        $fileName = 'bundle_zip/'.$bundle->name.'.zip';
            $zip = new ZipArchive;
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {

            $files = Files::files(public_path('bundle_pdf/'.$bundle->name));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }

        return response()->download(public_path($fileName));

    }


    //PDF Page Numbering
    public function pdfPageNumbering($file) {
        // initiate PDF
        $pdf = new PPDF();
        // set the source file
        $pageCount = $pdf->setSourceFile(public_path('generated_pdf/'.$file));
    
        $pdf->AliasNbPages();
        for ($i=1; $i <= $pageCount; $i++) { 
            //import a page then get the id and will be used in the template
            $tplId = $pdf->importPage($i);
            //create a page
            $pdf->AddPage();
            //use the template of the imporated page
            $pdf->useTemplate($tplId);
        }
    
        return $pdf->Output(public_path('generated_pdf/'.$file),'F');
    }

}

