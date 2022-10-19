<?php

namespace App\Http\Controllers;

use App\Actions\MakePdfAction;
use Illuminate\Http\Request;

class createPdfController extends Controller
{
    public function createPdf(Request $request)
    {
        $pdf = ($pdfMaker = new MakePdfAction($request->matchtable))->makePdf();

        $path = $pdfMaker->savePdfFile($pdf);

        return redirect(route('mailPdf', []));
    }
}
