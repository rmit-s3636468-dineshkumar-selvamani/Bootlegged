<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Store;
use App\Manufacturer;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


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
          ->update(['store_name' => $request->store_name,
          			'store_email' => $request->store_email,
          			'store_address' => $request->store_address,
          			'store_suburb' =>$request->store_suburb,
          			'store_state' =>$request->store_state,
          			'store_postcode' => $request->store_postcode,
          			'store_phone' => $request->store_phone,
          			'store_abn' => $request->store_abn,
          			'store_license' => $request->store_license,
          			'store_Stripeid' => $request->store_stripeid
          		]);
          if($request->store_password == '')
          {
		          User::where('store_id',Auth::user()->store_id)
		          ->update(['business_name' => $request->store_name,
		          			'email' => $request->store_email

		          		]);
      	  }
      	  else
      	  {
      	  	 User::where('store_id',Auth::user()->store_id)
		          ->update(['business_name' => $request->store_name,
		          			'email' => $request->store_email,
		          			'password' => Hash::make($request->store_password)

		          		]);
      	  }

          	$user = User::
		 	 		 where('store_id',Auth::user()->store_id)
		 	 		 ->first();
		 	 		 

		 	 $details = Store::
		 	 			 where('store_id',Auth::user()->store_id)
		 	 			 ->first();
		 	 			
           return back()-> with(['details'=>$details, 'user' => $user])
           			->with('message','Changes has been saved!!');


	}


public function saveManu(Request $request)
	{

		 // $validatedData = $request->validate([
   //      'title' => 'required|unique:posts|max:255',
   //      'body' => 'required',
   //  ]);

			Manufacturer::where('manu_id',Auth::user()->manu_id)
          ->update(['manu_name' => $request->manu_name,
          			'manu_email' => $request->manu_email,
          			'manu_address' => $request->manu_address,
          			'manu_suburb' =>$request->manu_suburb,
          			'manu_state' => $request->manu_state,
          			'manu_postcode' => $request->manu_postcode,
          			'manu_phone' => $request->manu_phone,
          			'manu_abn' => $request->manu_abn,
          			'manu_license' => $request->manu_license,
          			'manu_Stripeid' => $request->manu_stripeid
          		]);
          if($request->store_password == '')
          {
		          User::where('manu_id',Auth::user()->manu_id)
		          ->update(['business_name' => $request->manu_name,
		          			'email' => $request->manu_email

		          		]);
      	  }
      	  else
      	  {
      	  	 User::where('manu_id',Auth::user()->manu_id)
		          ->update(['business_name' => $request->manu_name,
		          			'email' => $request->manu_email,
		          			'password' => Hash::make($request->manu_password)

		          		]);
      	  }

          	$user = User::
		 	 		 where('manu_id',Auth::user()->manu_id)
		 	 		 ->first();
		 	 		 

		 
		 	 $details = Manufacturer::
		 	 			where('manu_id',Auth::user()->manu_id)
		 	 		  ->first();
		 	 			
           return back()-> with(['details'=>$details, 'user' => $user])
           			->with('message','Changes has been saved!!');


	}
}


