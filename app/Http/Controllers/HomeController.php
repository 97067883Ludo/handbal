<?php

namespace App\Http\Controllers;

use App\Models\Wedstrijd;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function GetHomePage()
    {
        return view('home', [
            'headers' => ['datum', 'tijd', 'thuisteam', 'uitteam', 'scheidsrechter 1', 'scheidsrechter 2', 'tafeldienst'],
            'avatar' => ucfirst(Auth::user()->name[0]),
            'wedstrijden' => Wedstrijd::all()->where('datum', '>', now())
        ]);
    }
}
