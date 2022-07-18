<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use App\Models\File;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Auth;
class DocumentController extends Controller
{
    public function convertWordToPDF(Request $request)
    {
            /* Set the PDF Engine Renderer Path */
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        //Load word file
        $Content = \PhpOffice\PhpWord\IOFactory::load(public_path('result.docx'));

        //Save it into PDF
        $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
        $PDFWriter->save(public_path('new-result.pdf'));
        echo 'File has been successfully converted';

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
    public function uploadDocuments(Request $request,$bundle_id,$section_id)
    {
        $filename = $request->file('files')->store('public/files');
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
            $PDFWriter = \PhpOffice\PhpWord\IOFactory::createWriter($Content,'PDF');
            $PDFWriter->save(public_path( $splitName[0].'.pdf'));

        }else if($splitName[1] == "jpe" || $splitName[1] == "jpeg" || $splitName[1] == "gif"  || $splitName[1] == "png"  || $splitName[1] == "JPG" || $splitName[1] == "jpg"  || $splitName[1] == "JPEG"  || $splitName[1] == "PNG" || $splitName[1] == "GIF")
        {
            $data['image'] = [$filename[2]];
            // $data['image'] = ['img1.jpg','img2.jpg'];

            $pdf = PDF::loadView('imgPdf', $data);
            $pdf->setPaper('L');
             $output=$pdf->output();
            $canvas = $pdf->getDomPDF()->getCanvas();

            $height = $canvas->get_height();
            $width = $canvas->get_width();

            $canvas->set_opacity(.2,"Multiply");

            $canvas->set_opacity(.2);

            $canvas->page_text($width/5, $height/2, 'Nicesnippets.com', null,
            55, array(0,0,0),2,2,-30);
            // return $pdf->download('mnp.pdf');
            file_put_contents($splitName[0].'.pdf', $output);
        }
        File::create(['filename'=>$splitName[0].'.pdf', 'mime_types'=>$splitName[1], 'user_id'=>auth()->user()->id,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
        unlink(storage_path("app/public/files".'\\'.$filename[2]));
        return redirect()->back();
    }
    public function create($bundle_id,$section_id)
    {
        $user = Auth::user();
        $file = File::where('user_id',auth()->user()->id)->get();
        if ($user->isAdmin()) {
            return view('pages.admin.home');
        }

        return view('pages.user.bundle.files.create',['file'=>$file,'bundle_id'=>$bundle_id,'section_id'=>$section_id]);
    }
    public function generate($bundle_id)
    {
        $files = File::where(["user_id"=>auth()->user()->id,'bundle_id'=>$bundle_id])->get();
        // dd($files);
         $pdf = PDFMerger::init();
        foreach($files as $f)
        {
            $pdf->addPDF(public_path($f->filename), 'all');
        }
        $fileName = time().'.pdf';
        $pdf->merge();
        $pdf->save(public_path($fileName));
        return response()->download(public_path($fileName));
    }
}
