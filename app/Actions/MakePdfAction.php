<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mpdf\Mpdf;
use Mpdf\MpdfException;

class MakePdfAction
{

    public function __construct(public $domHtml)
    {
    }

    /**
     * @throws MpdfException
     */
    public function makePdf(): Mpdf
    {
        $mpdf = new Mpdf(['format' => 'A4']);

        $mpdf->WriteHTML($this->domHtml);

        return $mpdf;
    }

    public function savePdfFile(Mpdf $pdf): string
    {
        $user = Auth::user();

        $path = $this->pathCreation();
        $pdf->Output($path, 'F');
        $user->addMedia($path)->toMediaCollection('archive');

        return $path;
    }

    private function pathCreation(): string
    {

        $uuid = Str::uuid()->toString();
        $path = storage_path('app/public/pdf-output/' . $uuid . '.pdf');
        return $path;
    }

}
