<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class UploadController extends Controller
{


    public function FileUploaded(Request $request)
    {

        if ($request->hasFile('fileToUpload')) {
            //the current request has a file if not then return back home
        }else{
            return back()->with('error', 'er is iet mis gegaan');
        }

        if ($request->file('fileToUpload')->getMimeType() == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
            //pass
        }else{
            return back()->with('error', 'er is iet mis gegaan');
        }

        $user = Auth::user();

        if ($user->hasMedia()){
            $user->clearMediaCollection('default');
        }

        $user
            ->addMedia($request->fileToUpload) //starting method
            ->withCustomProperties(['mime-type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']) //middle method
            ->preservingOriginal() //middle method
            ->toMediaCollection(); //finishing method

        return redirect()->route('/home');
    }

}
