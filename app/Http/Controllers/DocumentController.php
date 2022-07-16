<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
 
class DocumentController extends Controller
{
    public function convertWordToPDF()
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
    public function convertImageToPDF()
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
}
