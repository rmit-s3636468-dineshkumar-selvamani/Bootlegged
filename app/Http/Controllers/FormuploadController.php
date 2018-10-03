<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
class FormuploadController extends Controller
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

    public function index()
    {   
            
        return view('bulkupload');
    }

    public function upload(Request $request)
    {   
       if( $this->validate($request, array(
      'file'   => 'max:10240|required|mimes:csv,xlsx',
    ))){
        if($request->file('file')->isValid()){
           
            $file = $request->file('file');
            $file->move ('uploads',$file->getClientOriginalName());

             return back()->with('message', 'File Uploaded Successfully');
        }
        else
        {
            return back()->with('message', 'No file or wrong file Uploaded');
        }
    }
    else{
         return back()->with('message', 'No file or wrong file Uploaded');
    }
    }

}
