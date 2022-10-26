<?php

namespace App\Http\Controllers;

use App\Actions\GetPdfFileAction;
use App\Mail\test;
use App\Notifications\sendPdfNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $fileUri = (new GetPdfFileAction($request->file, 'archive'))->getUri();

        $text = $request->text . "Link naar bestand: <br />" . $fileUri;

        Mail::to($request->to)->send(new test($request->subject, $text));

    }
}
