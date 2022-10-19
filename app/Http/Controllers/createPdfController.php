<?php

namespace App\Http\Controllers;

use App\Actions\MakePdfAction;
use Illuminate\Http\Request;

class createPdfController extends Controller
{
    public function createPdf(Request $request)
    {
        $pdf = ($pdfMaker = new MakePdfAction($request->matchtable))->makePdf();

        $file = $pdfMaker->savePdfFile($pdf);

        $file = json_decode($file, true);

        return redirect(route('mailPdf', [
            'file' => $file['id']
        ]));
    }
}
