<?php

namespace App\Actions;

use App\Mail\test;
use Illuminate\Support\Facades\Mail;

class SendEmailAction
{
    public static function send($request)
    {
        $fileUri = (new GetPdfFileAction($request->file, 'archive'))->getUri();

        $text = $request->text . "Link naar bestand: <br />" . $fileUri;

        try {
            Mail::to($request->to)->send(new test($request->subject, $text));
            return redirect()->to(route('/home'))->with(['email' => 'true']);
        }
        catch(\Symfony\Component\Mailer\Exception\TransportException $e) {
            return redirect()->to(route('/home'))->with(['email' => 'false']);
        }
    }
}
