<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class HomeController extends Controller
{

    private $rows = null;

    public function GetHomePage()
    {

        if (Auth::user()->hasMedia()) {

            $file = new XlsxController();
            $this->rows = $file->GetRows();

        }else{
            return view('home', [
                'avatar' => ucfirst(Auth::user()->name[0]),
                'rows' => $this->rows
            ]);
        }

        return view('home', [
            'avatar' => ucfirst(Auth::user()->name[0]),
            'rows' => $this->rows
        ]);

    }

}
