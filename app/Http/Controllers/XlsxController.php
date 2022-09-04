<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class XlsxController extends Controller
{

    protected $allRows;
    protected $filePath;
    protected $header;

    function __construct()
    {
        $this->filePath = $this->getMediaPath();
    }

    public function GetRows()
    {
        $rows = SimpleExcelReader::create($this->filePath)->getRows();
        foreach ($rows as $row){
            $this->allRows[] = $row;
        }

        return $this->allRows;
    }

    public function getHeader()
    {
        return SimpleExcelReader::create($this->filePath)->getHeaders();
    }

    private function getMediaPath()
    {

        $mediaItems = Auth::user()->getMedia();

        $filePath = $mediaItems[0]->getPath();

        return $filePath;
    }
}
