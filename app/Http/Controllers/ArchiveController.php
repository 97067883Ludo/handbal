<?php

namespace App\Http\Controllers;

use App\Actions\DeleteArchiveItemAction;
use App\Actions\GetPdfFileAction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(): Application|Factory|View
    {
        $archiveItems = (new getPdfFileAction(null, 'archive'));


        return view('archive', [
            'archiveItems' => $archiveItems->media,
            'headers' => ['item', 'Gemaakt op', '']
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
           'file' => 'required',
        ]);

        DeleteArchiveItemAction::handle($request->file);

        return redirect()->to(route('archive'))->with(['delete' => 'true']);

    }
}
