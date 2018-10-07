<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Route::get('home', function(){
//     return View('welcome'); // Your Blade template name
// });
Route::get('registerman', function(){
    return View('auth/registerman'); // Your Blade template name
});


Route::get('registersto', function(){
    return View('auth/registersto'); // Your Blade template name
});

Route::get('choose', function(){
    return View('choose'); // Your Blade template name
});
	
Route::get('loginmanu', function(){
    return View('auth/loginmanu'); // Your Blade template name
});

Route::get('loginstor', function(){
    return View('auth/loginstor'); // Your Blade template name
});


Route::post('/register_man', ['as' => 'register_man', 'uses' => 'Auth\ManufacturerController@register']);

Route::post('/register_sto', ['as' => 'register_sto', 'uses' => 'Auth\StoreController@register']);


// Route::post('/login_man','loginmanuController@login');

Route::get('welcome', function () {
    return redirect('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/mylistings', 'MyListingsController@index')->name('mylistings');

Route::get('/addlistings', 'AddListingsController@index')->name('addlistings');


Route::get('/filter/{id}', 'HomeController@filter')->name("dashboard/filter");

Route::get('/filterName/{id}', 'HomeController@filterName')->name("dashboard/filter");

//AUtocomplete

Route::get('/user/find', 'HomeController@searchUsers');
 
Route::get('/editProfile', 'EditProfileController@index')->name('editProfile');

Route::post('/store_editProfile', ['as' => 'store_editProfile', 'uses' => 'EditProfileController@saveStore']);

Route::post('/manu_editrofile', ['as' => 'manu_editProfile', 'uses' => 'EditProfileController@saveManu']);

Route::get('/history', 'HistoryController@index');



//Add new product
Route::post('/createnewprod', ['as' => 'createnewprod', 'uses' => 'AddNewProductController@savenewprod']);


Route::post('create','AddListingsController@insert');



//File Upload
Route::get('uploadchoose', function(){
    return View('uploadchoose'); // Your Blade template name
});

Route::get('/upload', 'FormuploadController@index');

Route::post('upload', 'FormuploadController@upload');

Route::get('/downloads', 'DownloadFileController@download');


// Delete Product

Route::post('removeproduct', 'MyListingsController@remove')->name('mylistings');

Route::post('update', 'MyListingsController@saveprod')->name('mylistings');

Route::get('newprod', function(){
    return View('newprod'); // Your Blade template name
});


//Forget Password

//Cart Index
Route::get('/cart', 'CartController@index')->name('cart.index');
// Add item to cart
Route::get('/addToCart/{id}', 'CartController@addToCart')->name('cart.add-item');
// Minus quantity function
Route::post('/updateItem', 'CartController@updateItem')->name('cart.update');
// Remove Item
Route::get('/removeItem/{id}', 'CartController@removeItem')->name('cart.remove');
// Clear Cart
Route::get('/clearCart', 'CartController@clearCart')->name('cart.clear');
// Cart Checkout
Route::post('/checkout', 'CheckoutController@checkout')->name('cart.checkout');

