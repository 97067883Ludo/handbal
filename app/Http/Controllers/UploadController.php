<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{

    public function FileUploaded(Request $request)
    {

        if ($request->hasFile('fileToUpload')) {
            //the current request has a file if not then return back home
        }else{
            return back()->with('error', 'er is iet mis gegaan');
        }


    }

}
