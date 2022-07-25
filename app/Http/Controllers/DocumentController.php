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


use NPDF;
use Auth;
use Storage;
use File as Files;
use Session;
use MPDF;
use setasign\Fpdi\Fpdi;
class DocumentController extends Controller
{
    public function convertWordToPDF(Request $request)
    {
            /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/mpdf/mpdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('MPDF');

        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('demo.docx'));

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'HTML');
        $PDFWriter->save(public_path('../resources/views/pdf/encoded.blade.php'));
        $watermark = true;
        $watermark_type = "TEXT";
            if($watermark_type == "TEXT")
            {
            $watermark_content = "HRIDOY BUNDLE";

            }else{
            $watermark_content = public_path('logo.png');
            }
        $view['view'] = view('pdf.encoded')->render();
        $pdf = MPDF::loadView('newDocsPdf', $view);
        if($watermark_type == "TEXT")
        {
            $pdf->mpdf->SetWatermarkText('DRAFT');
            $pdf->mpdf->showWatermarkText = true;


        }else{

            $pdf->SetWatermarkImage();
        }
        return $pdf->download('mnp.pdf');

    }
    public function convertImageToPDF(Request $request)
    {
            $data['image'] = ['img1.jpg','img2.jpg'];

            $pdf = PDF::loadView('imgPdf', $data);
            $pdf->setPaper('L');
            $pdf->output();
            $canvas = $pdf->getDomPDF()->getCanvas();

            $height = $canvas->get_height();
            $width = $canvas->get_width();

            $canvas->set_opacity(.2,"Multiply");

            $canvas->set_opacity(.2);

            $canvas->page_text($width/5, $height/2, 'Nicesnippets.com', null,
            55, array(0,0,0),2,2,-30);
            return $pdf->download('mnp.pdf');
    }
    public function delete($id)
    {
        $file = File::where('id',$id);
        if($file->count() > 0)
        {
            $file = $file->first();
            unlink(public_path($file->filename));
            $file->delete();
            return redirect()->back();
        }
    }
    public function show($bundle_id,$section_id,$id)
    {
        $file = File::where('id',$id);
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
            mkdir(public_path('app/public/files'), 0777, true);
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
                $Content = \PhpOffice\PhpWord\IOFactory::load(storage_path("app/public/files".'\\'.$filename[2]));

                //Save it into PDF
                 $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'HTML');
             if (!file_exists(public_path('../resources/views/pdf'))) {
                mkdir(public_path('../resources/views/pdf'), 0777, true);
            }
            $PDFWriter->save(public_path('../resources/views/pdf/'. $splitName[0].'.blade.php'));
            // $pdf = NPDF::loadFile(public_path('pdf/'. $splitName[0].'.pdf')); $pdf->save(public_path('file.pdf'));

            $view['view'] = view('pdf.'.$splitName[0])->render();


            $pdf = MPDF::loadView('newDocsPdf', $view);
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(public_path("../resources/views/pdf/".'\\'.$splitName[0].'.blade.php'));

            }else if($splitName[1] == "jpe" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
            {
                $data['image'] = [$filename[2]];
                // $data['image'] = ['img1.jpg','img2.jpg'];

                $pdf = PDF::loadView('imgPdf', $data);
                $pdf->setPaper('L');
                // return $pdf->download('mnp.pdf');
                $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
                   unlink(storage_path("app/public/files".'\\'.$filename[2]));
            }else{
            $sourcePath=storage_path("app/public/files/".$filename[2]);
            $destinationPath=public_path('pdf/'.$filename[2]);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }

        }

            File::where('id',$file_id)->update(['filename'=>$splitName[0].'.pdf', 'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);

            return response()->json(['success'=>$splitName[0].'.pdf']);

        }
    }
    public function uploadDocuments(Request $request)
    {
        if (!file_exists(storage_path('app/public/files'))) {
            mkdir(public_path('app/public/files'), 0777, true);
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
            $Content = \PhpOffice\PhpWord\IOFactory::load(storage_path("app/public/files".'\\'.$filename[2]));


            //Save it into PDF
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'HTML');
             if (!file_exists(public_path('../resources/views/pdf'))) {
                mkdir(public_path('../resources/views/pdf'), 0777, true);
            }
            $PDFWriter->save(public_path('../resources/views/pdf/'. $splitName[0].'.blade.php'));
            // $pdf = NPDF::loadFile(public_path('pdf/'. $splitName[0].'.pdf')); $pdf->save(public_path('file.pdf'));

            $view['view'] = view('pdf.'.$splitName[0])->render();


            $pdf = MPDF::loadView('newDocsPdf', $view);
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(public_path("../resources/views/pdf/".'\\'.$splitName[0].'.blade.php'));

        }else if($splitName[1] == "jpe" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
        {
            $image = [$filename[2]];
            // $image = ['img1.jpg','img2.jpg'];

            $pdf = Pdf::loadView('imgPdf', compact('image'));
            // return view('imgPdf', compact('image'));
            $pdf->setPaper('L');
            $pdf->save(public_path('pdf/'.$splitName[0].'.pdf'));
            unlink(storage_path("app/public/files".'\\'.$filename[2]));
        }else{
            $sourcePath=storage_path("app/public/files/".$filename[2]);
            $destinationPath=public_path('pdf/'.$filename[2]);
            if(Files::exists($sourcePath)){
                Files::move($sourcePath,$destinationPath);
            }

        }
        File::create(['filename'=>$splitName[0].'.pdf', 'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);

        // return "<script>window.location.href='".route('section.show',)."'</scrip>";
        return response()->json(['success'=>$splitName[0].'.pdf']);
    }
    public function create($bundle_id,$section_id)
    {
        $user = Auth::user();
        $file = File::where('user_id',auth()->user()->id)->get();
        if ($user->isAdmin()) {
            return view('backend.pages.dashboard');
        }

        return view('backend.pages.bundle.files.create',['file'=>$file,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
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
                $cpdf = PDF::loadView('sectionPdf', compact('sec'));
                $cpdf->setPaper('L');
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
        // foreach($sections as $sece)
        // {
        //     foreach($sec->files as $f){
        //         unlink(public_path('pdf/'.$f->filename));
        //     }
        // }
        generatedTable::create(['bundle_id'=>$bundle_id,'filename'=>$fileName]);
        return redirect()->back();
    }




    //setWaterMark

    public function watermark($id){
        // Source file and watermark config
        $settings = Setting::where(['user_id'=>auth()->user()->id,'name'=>"watermark"])->first();
        $generated_pdf = generatedTable::where("id",$id)->first();
        $file = public_path('generated_pdf/'.$generated_pdf->filename);
        $text = $settings->value;

        // dd($file);
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

        // Background color
        $bg = imagecolorallocate($img, 255, 255, 255);
        imagefilledrectangle($img, 0, 0, $width, $height, $bg);

        // Font color settings
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

        // Create watermark image
        imagecopymerge($blank, $img, 0, 0, 0, 0, $width, $height, $op);
        imagepng($blank, $name.".png");

        // Set source PDF file
        $pdf = new Fpdi();
        if(file_exists($file)){
            $pagecount = $pdf->setSourceFile($file);
        }else{
            die('Source PDF not found!');
        }

        // Add watermark to PDF pages
        for($i=1;$i<=$pagecount;$i++){
            $tpl = $pdf->importPage($i);
            $size = $pdf->getTemplateSize($tpl);
            $pdf->addPage();
            $pdf->useTemplate($tpl, 1, 1, $size['width'], $size['height'], TRUE);

            //Put the watermark
            $xxx_final = ($size['width']-50);
            $yyy_final = ($size['height']-25);
            if($settings->type == "TEXT"){
                $pdf->Image($name.'.png', $xxx_final, $yyy_final, 0, 0, 'png');
            }else{
                $xxx_final = ($size['width']-75);
                $yyy_final = ($size['height']-35);
                $image = public_path('watermark/'.$settings->value);
                $pdf->Image($image, $xxx_final, $yyy_final, 0, 0, 'png');

            }

        }
        unlink(public_path($name.'.png'));

        // Output PDF with watermark
        $bundle = Bundle::where("id",$generated_pdf->bundle_id)->first();
        $pdf->Output('D', $bundle->name.'.pdf');
    }

}

