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

use ZipArchive;

use NPDF;
use Auth;
use Storage;
use File as Files;
use Session;
use MPDF;
use setasign\Fpdi\Fpdi;
class DocumentController extends Controller
{

    public function delete($id)
    {
        $file = File::where('id',$id);
        if($file->count() > 0)
        {
            $file = $file->first();
            unlink(public_path('pdf/'.$file->filename));
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
    public function update(Request $request)
    {
        if (!file_exists(storage_path('app/public/files'))) {
            mkdir(storage_path('app/public/files'), 0777, true);
        }
        $filename = $request->file('file')->store('public/files');
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


            $pdf = MPDF::loadView('newDocsPdf', $view);
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(public_path("../resources/views/pdf/".$splitName[0].'.blade.php'));

            }else if($splitName[1] == "jpe" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
            {
                $data['image'] = [$filename[2]];

                $pdf = MPDF::loadView('imgPdf', $data);
                $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
                   unlink(storage_path("app/public/files/".$filename[2]));
            }else{
            $sourcePath=storage_path("app/public/files/".$filename[2]);
            $destinationPath=public_path('pdf/'.$filename[2]);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }

        }
            $path = public_path('pdf/'.$splitName[0].'.pdf');
            $totalPage = $this->countPages($path);
            File::where('id',$file_id)->update(['filename'=>$splitName[0].'.pdf', 'totalPage'=>$totalPage,'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);

            return response()->json(['success'=>$splitName[0].'.pdf']);

        }
    }
    public function uploadDocuments(Request $request)
    {

        if (!file_exists(storage_path('app/public/files'))) {
            mkdir(storage_path('app/public/files'), 0777, true);
        }
        $filename = $request->file('file')->store('public/files');
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


            $pdf = MPDF::loadView('newDocsPdf', $view);
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(public_path("../resources/views/pdf/".$splitName[0].'.blade.php'));

        }else if($splitName[1] == "jpg" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
        {
            $image = [$filename[2]];

            $pdf = MPDF::loadView('imgPdf', compact('image'));
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(storage_path("app/public/files/".$filename[2]));
        }else{
            $sourcePath=storage_path("app/public/files/".$filename[2]);
            $destinationPath=public_path('pdf/'.$filename[2]);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }

        }
        $path = public_path('pdf/'.$splitName[0].'.pdf');
        $totalPage = $this->countPages($path);
        File::create(['filename'=>$splitName[0].'.pdf', 'totalPage'=>$totalPage,'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
        return response()->json(['success'=>$splitName[0].'.pdf']);
    }
    public function create($bundle_id,$section_id)
    {


        $user = Auth::user();
        $section = Section::with(['bundle'])->where('user_id',auth()->user()->id)->where('bundle_id',$bundle_id)->first();

        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }
        return view('backend.pages.bundle.files.create',['section'=>$section,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
    }
    public function generate($bundle_id)
    {
        $files = File::where(["user_id"=>auth()->user()->id,'bundle_id'=>$bundle_id])->get();
        // dd($files);
        $sections = Section::with('files')->where('bundle_id',$bundle_id)->orderBy('sort_id','ASC')->get();
        $pdf = PDFMerger::init();
        foreach($sections as $sec)
        {
            if (!file_exists(public_path('pdf'))) {
                mkdir(public_path('pdf'), 0777, true);
            }
            if($sec->isDefault == 0){
                $cpdf = MPDF::loadView('sectionPdf', compact('sec'));
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
        Session::flash('message', 'Bundle Generated Successfully');
        generatedTable::create(['bundle_id'=>$bundle_id,'filename'=>$fileName]);
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
            $generated_pdf = generatedTable::where("id",$id)->first();
            $file = public_path('generated_pdf/'.$generated_pdf->filename);
            if(!is_null($settings)){
                $text = $settings->value;
            }else{
                $text =env('APP_NAME');
            }
            // Text font settings
            $name = uniqid();
            $font_size = 5;
            $opacity = 100;
            $ts = explode("\n", $text);
            $width = 0;
            foreach($ts as $k=>$string){
                $width = max($width, strlen($string));
            }
            $width  = imagefontwidth($font_size)*$width;
            $height = imagefontheight($font_size)*count($ts);
            $el = imagefontheight($font_size);
            $em = imagefontwidth($font_size);
            $img = imagecreatetruecolor($width, $height);

            $bg = imagecolorallocate($img, 255, 255, 255);
            imagefilledrectangle($img, 0, 0, $width, $height, $bg);

            $color = imagecolorallocate($img, 0, 0, 0);
            foreach($ts as $k=>$string){
                $len = strlen($string);
                $ypos = 0;
                for($i=0;$i<$len;$i++){
                    $xpos = $i * $em;
                    $ypos = $k * $el;
                    imagechar($img, $font_size, $xpos, $ypos, $string, $color);
                    $string = substr($string, 1);
                }
            }
            imagecolortransparent($img, $bg);
            $blank = imagecreatetruecolor($width, $height);
            $tbg = imagecolorallocate($blank, 255, 255, 255);
            imagefilledrectangle($blank, 0, 0, $width, $height, $tbg);
            imagecolortransparent($blank, $tbg);
            $op = !empty($opacity)?$opacity:100;
            if ( ($op < 0) OR ($op >100) ){
                $op = 100;
            }

            imagecopymerge($blank, $img, 0, 0, 0, 0, $width, $height, $op);
            imagepng($blank, $name.".png");

            $pdf = new Fpdi();
            if(file_exists($file)){
                $pagecount = $pdf->setSourceFile($file);
            }else{
                die('Source PDF not found!');
            }

            for($i=1;$i<=$pagecount;$i++){
                $tpl = $pdf->importPage($i);
                $size = $pdf->getTemplateSize($tpl);
                $pdf->addPage();
                $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], TRUE);

                $xxx_final = ($size['width']-50);
                $yyy_final = ($size['height']-25);
                if(!is_null($settings)){
                    if($settings->type == "TEXT"){
                        $pdf->Image($name.'.png', $xxx_final, $yyy_final, 0, 0, 'png');
                    }else{
                        $xxx_final = ($size['width']-75);
                        $yyy_final = ($size['height']-35);
                        $image = public_path('watermark/'.$settings->value);
                        $pdf->Image($image, $xxx_final, $yyy_final, 0, 0, 'png');
                    }
                }else{
                    $pdf->Image($name.'.png', $xxx_final, $yyy_final, 0, 0, 'png');

                }

            }
            unlink(public_path($name.'.png'));

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
            $pdf->Output('F', public_path('bundle_pdf/'.$bundle->name.'/'.$bundle->name.'.pdf'));

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
        }else{
            $generated_pdf = generatedTable::where("id",$id)->first();
            $file = public_path('generated_pdf/'.$generated_pdf->filename);
            $bundle = Bundle::where("id",$generated_pdf->bundle_id)->first();
            if (!file_exists(public_path('bundle_pdf'))) {
                mkdir(public_path('bundle_pdf'), 0777, true);
            }
            if (!file_exists(public_path('bundle_pdf/'.$bundle->name))) {
                mkdir(public_path('bundle_pdf/'.$bundle->name), 0777, true);
            }
            $sourcePath= public_path('generated_pdf/'.$generated_pdf->filename);
            $destinationPath=public_path('bundle_pdf/'.$bundle->name.'/'.$generated_pdf->filename);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }
            if (!file_exists(public_path('bundle_zip'))) {
                    mkdir(public_path('bundle_zip'), 0777, true);
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
    }

}

