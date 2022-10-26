<?php

namespace App\Http\Controllers;

use App\Actions\SendEmailAction;
use App\Notifications\sendPdfNotification;
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

    public function sendMail(Request $request)
    {
        $request->validate([
            'to' => 'required|Email',
            'subject' => 'required',
            'text' => 'required',
        ]);

        return SendEmailAction::send($request);
    }
}
