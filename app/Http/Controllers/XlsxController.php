<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class XlsxController extends Controller
{

    public function GetRows()
    {

        SimpleExcelReader::create('excelFile.xlsx')->getRows()->each();
    }
}
