<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class XlsxController extends Controller
{

    public function GetRows()
    {
        $filepath = $this->getMediaPath();


        $rows = SimpleExcelReader::create($filepath)->getRows();

        foreach ($rows as $row){
            $allRows[] = $row;
        }

        return $allRows;
    }

    private function getMediaPath()
    {

        $mediaItems = Auth::user()->getMedia();

        $filePath = $mediaItems[0]->getPath();

        return $filePath;
    }
}
