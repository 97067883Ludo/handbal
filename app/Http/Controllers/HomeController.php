<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class HomeController extends Controller
{



    public function GetHomePage()
    {

        if (Auth::user()->hasMedia()) {

            $file = new XlsxController();
            $rows = $file->GetRows();



        }else{
            //when there is no file
        }

        return view('home', [
            'avatar' => ucfirst(Auth::user()->name[0]),
            'rows' => $rows
        ]);

    }

}
