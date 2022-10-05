<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
        }else{
            return view('home', [
                'avatar' => ucfirst(Auth::user()->name[0]),
                'rows' => $this->rows
            ]);
        }

        return view('home', [
            'avatar' => ucfirst(Auth::user()->name[0]),
            'headers' => $this->header,
            'rows' => $this->rows
        ]);
    }
}
