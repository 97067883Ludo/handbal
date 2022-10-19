<?php

namespace App\Http\Controllers;

use App\Actions\MakePdfAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mailPdfController extends Controller
{
    public function view(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        $files = Auth::user()->getMedia('archive');

        $file = $this->findFile($files, $request->file);

        return view('composeEmail', [
            'file' => $file
        ]);
    }

    private function findFile($files, $needle)
    {
        foreach ( $files as $file ) {
            if ($file->id == $needle) {
                return $file;
            }
        }
    }
}
