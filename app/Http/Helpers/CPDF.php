<?php
namespace App\Http\Helpers;
use setasign\Fpdi\Fpdi;
 
class CPDF extends FPDI
{
 
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}