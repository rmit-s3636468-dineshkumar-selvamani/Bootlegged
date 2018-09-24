<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Store;
use App\Manufacturer;
use Auth;
use Illuminate\Support\Facades\DB;


class EditProfileController extends Controller
{	



	public function index()
	{
		 if(Auth::user()->type == "StoreOwner")  

		 { 
		 	 $user = User::
		 	 		 where('store_id',Auth::user()->store_id)
		 	 		 ->first();
		 	 		 

		 	 $details = Store::
		 	 			 where('store_id',Auth::user()->store_id)
		 	 			 ->first();
		 	 			

		 	 return view('editProfile')-> with(['details'=>$details, 'user' => $user]);
		}

		else
		{
			$user =	 User::
		 	 		 where('manu_id',Auth::user()->manu_id)
		 	 		  ->first();
		 	 		

		 	 $details = Manufacturer::
		 	 			where('manu_id',Auth::user()->manu_id)
		 	 		  ->first();
		 	 			

		 	 return view('editProfile')-> with(['details'=>$details, 'user' => $user]);

		}
	}


	public function saveStore(Request $request)
	{

		 // $validatedData = $request->validate([
   //      'title' => 'required|unique:posts|max:255',
   //      'body' => 'required',
   //  ]);

			Store::where('store_id',Auth::user()->store_id)
          ->update(['store_name' => $request->store_name]);


          	$user = User::
		 	 		 where('store_id',Auth::user()->store_id)
		 	 		 ->first();
		 	 		 

		 	 $details = Store::
		 	 			 where('store_id',Auth::user()->store_id)
		 	 			 ->first();
		 	 			
           return view('editProfile')-> with(['details'=>$details, 'user' => $user]);


	}
}
