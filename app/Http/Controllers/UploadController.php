<?php

namespace App\Http\Controllers;

use App\Actions\insertMatchesIntoDatabaseAction;
use App\Actions\Xlsx\MapXlsxHeaderToDbColumnsAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{


    public function FileUploaded(Request $request)
    {

        if (!$request->hasFile('fileToUpload')) {
            return back()->with('error', 'er is iet mis gegaan');
        }

        if ($request->file('fileToUpload')->getMimeType() != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
            return back()->with('error', 'er is iet mis gegaan');
        }

        $file = Storage::disk('local')->put('wedstrijd', $request->file('fileToUpload'));

        $filePath = storage_path('app/'.$file);

        $mappedMatches = (new MapXlsxHeaderToDbColumnsAction)($filePath);

        (new insertMatchesIntoDatabaseAction())($mappedMatches);

        File::delete($filePath);
        return redirect()->route('/home');
    }

}
