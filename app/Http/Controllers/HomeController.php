<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class HomeController extends Controller
{

    private $rows = null;

    private $header = null;

    public function GetHomePage()
    {

        if (Auth::user()->hasMedia()) {

            $file = new XlsxController();
            $this->header = $file->getHeader();
            $this->rows = $file->GetRows();

            dd($this->rows);

        }else{
            return view('home', [
                'avatar' => ucfirst(Auth::user()->name[0]),
                'rows' => $this->rows
            ]);
        }

        return view('home', [
            'avatar' => ucfirst(Auth::user()->name[0]),
            'header' => $this->header,
            'rows' => $this->rows
        ]);

    }

}
