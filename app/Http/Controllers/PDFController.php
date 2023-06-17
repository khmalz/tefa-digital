<?php

namespace App\Http\Controllers;

use App\Models\Admin\Design;
use App\Models\Admin\Photography;
use App\Models\Admin\Printing;
use App\Models\Admin\Videography;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{

    /**
     * Create PDF instance with common settings
     */
    private function createPdf()
    {
        return Pdf::setOptions(['defaultFont' => 'sans-serif'])->setPaper([0, 0, 500, 400], 'landscape');
    }

    /**
     * Generate pdf for Design
     */
    public function exportDesign(Design $design)
    {
        $pdf = $this->createPdf()->loadView('pdf-design', compact('design'));
        return $pdf->stream();
    }

    /**
     * Generate pdf for Photography
     */
    public function exportPhotography(Photography $photography)
    {
        $pdf = $this->createPdf()->loadView('pdf-photography', compact('photography'));
        return $pdf->stream();
    }

    /**
     * Generate pdf for Videography
     */
    public function exportVideography(Videography $videography)
    {
        $pdf = $this->createPdf()->loadView('pdf-videography', compact('videography'));
        return $pdf->stream();
    }

    /**
     * Generate pdf for Printing
     */
    public function exportPrinting(Printing $printing)
    {
        $pdf = $this->createPdf()->loadView('pdf-printing', compact('printing'));
        return $pdf->stream();
    }
}
