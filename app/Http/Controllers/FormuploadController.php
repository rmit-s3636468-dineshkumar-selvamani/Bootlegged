<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
class FormuploadController extends Controller
{
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
       $this->validate($request,[
           'file'   => 'max:10240|required|mimes:csv,xlsx',   
        ],[
          'file.mimes' => 'Upload the .csv or .xlsx file',
             
        ]); 

       
        if($request->file('file')->isValid()){
           
            $file = $request->file('file');
            if( Auth::user()->type == “Manufacturer”)
            {
                $file->move (‘uploads’,“m”.“_”.Auth::user()->manu_id.“_”.date(‘Y-m-d’).“_”.time().“_”.$file->getClientOriginalName());
            }
            else
            {
                $file->move (‘uploads’,“s”.“_”.Auth::user()->store_id.“_”.date(‘Y-m-d’).“_”.time().“_”.$file->getClientOriginalName());
            }

             return back()->with('message', 'File Uploaded Successfully');
        }
        else
        {
            return back()->with('message', 'No file  Uploaded');
        }
    
   
    }

}
