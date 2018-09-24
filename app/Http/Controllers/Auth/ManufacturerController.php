<?php

namespace App\Http\Controllers\Auth;

use App\Manufacturer;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;





class ManufacturerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
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
            'manu_name' => 'required|string|max:255',
            'manu_email' => 'required|string|email|max:255|unique:Manufacturers',
            'password' => 'required|string|min:6|confirmed',
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

         $user = Manufacturer::create([
            'manu_email' => $data['manu_email'],
            'manu_name' => $data['manu_name'],
            'manu_address' => $data['manu_address'],
            'manu_suburb' => $data['manu_suburb'],
            'manu_state' => $data['manu_state'],
            'manu_postcode' => $data['manu_postcode'],
            'manu_phone' => $data['manu_phone'],
            'manu_abn' =>$data['manu_abn'],
            'manu_license' =>$data['manu_license'],
            'manu_Stripeid' =>$data['manu_Stripeid'],
        ]);
        $myField = Manufacturer::where('manu_email', $data['manu_email'])->first()->manu_id;
        $user->userData = User::create([
            
            // 'store_id' => 0,
            'manu_id'=> $myField,
            'business_name' => $data['manu_name'],
            'email' => $data['manu_email'],
            'password' => Hash::make($data['password']),
            'verifiedStatus' => 0,
            'type' => 'Manufacturer',
            'permissions' => 'Manufacturer',
        ]);

        return $user;
       


        
        
   }


}
