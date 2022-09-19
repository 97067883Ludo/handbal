<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function getHomeControle(Request $request)
    {
        $request->validate([
            'wedstrijden'=>'required',
            'filters'=>'required'
        ]);

        $matches = FilterController::filterSelectedMatches($request->wedstrijden, $request->filters);

//        dd($matches);

        $data = view('match-table', [
            'matchtable' => $matches
        ])->render();

        return view('controle', [
            'data' => $data
        ]);
    }
}
