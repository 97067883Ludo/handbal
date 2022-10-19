<?php

namespace App\Http\Controllers;

use App\Actions\MakePdfAction;
use Illuminate\Http\Request;

class mailPdfController extends Controller
{
    public function getPage()
    {
        return view('composeEmail');
    }
}
