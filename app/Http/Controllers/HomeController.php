<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\SimpleExcel\SimpleExcelReader;

class HomeController extends Controller
{
    public function GetHomePage()
    {

        XlsxController::GetRows();

        return view('home', [
            'avatar' => ucfirst(Auth::user()->name[0]),
        ]);

    }

}
