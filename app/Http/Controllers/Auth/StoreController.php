<?php

namespace App\Http\Controllers\Auth;

use App\Store;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

     use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'store_name' => 'required|string|max:255',
            'store_email' => 'required|string|email|max:255|unique:Store',
            'password' => 'required|string|min:6|confirmed',
             'store_address' => 'required|string|min:3',
            'store_suburb' => 'required|string|min:3',
            'store_postcode' => 'required|integer|digits:4',
            'store_phone' => 'required|regex:/[0-9]{9}/',
            'store_abn' => 'required|integer|digits:11',
            
        ],[
                'store_name.required' => ' The first name field is required.',
                'store_email.email' => ' Not a valid email format.',
                
               



         ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       $user = Store::create([

            'store_email' => $data['store_email'],
            'store_name' => $data['store_name'],
            'store_address' => $data['store_address'],
            'store_suburb' => $data['store_suburb'],
            'store_state' => $data['store_state'],
            'store_postcode' => $data['store_postcode'],
            'store_phone' => $data['store_phone'],
            'store_abn' => $data['store_abn'],
            'store_license' => $data['store_license'],
            'store_Stripeid' => $data['store_Stripeid'],
        ]);

        $myField = Store::where('store_email', $data['store_email'])->first()->store_id;

        $user->userData = User::create([
            
            'store_id' => $myField,
            // 'manu_id'=> $myField,
            'business_name' => $data['store_name'],
            'email' => $data['store_email'],
            'password' => Hash::make($data['password']),
            'verifiedStatus' => 0,
            'type' => 'StoreOwner',
            'permissions' => 'StoreOwner',
        ]);

        return $user;
        // return redirect()->route('welcome');
   }


}

