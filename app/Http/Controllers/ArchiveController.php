<?php

namespace App\Http\Controllers;

use App\Actions\GetPdfFileAction;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function show(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $archiveItems = (new getPdfFileAction(null, 'archive'));

//        dd($archiveItems->media->addAttributeToFilter('created_at', 'desc'));
        return view('archive', [
            'archiveItems' => $archiveItems->media->sortDesc(),
            'headers' => ['item', 'Gemaakt op', 'opties']
        ]);
    }

    public function delete(Request $request)
    {
        $archiveItem = (new getPdfFileAction($request->file, 'archive'));

        $archiveItem->media->delete();

        return redirect()->to(route('archive'))->with(['delete' => 'true']);

    }
}
