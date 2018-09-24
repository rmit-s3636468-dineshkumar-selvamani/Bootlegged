<?php

use Illuminate\Http\Request;
use app\StoreListing;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search',function(){
 $query = Input::get('query');
 $users = StoreListing::where('sListing_type','like','%'.$query.'%')->get();
 return response()->json($users);
});