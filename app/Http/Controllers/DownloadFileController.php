<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
class DownloadFileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function download(Request $request){
        $file= public_path(). "/download/Test.xlsx";

    $headers = array(
              'Content-Type: application/xlsx',
            );

    return response()->download($file, 'Test.xlsx', $headers);
    }
}
