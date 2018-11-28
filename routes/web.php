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

Route::get('welcome', function () {
    return redirect('welcome');
});

Route::get('login', function () {
    return View('auth/login');
});

Route::post('login', function () {
    return View('auth/login');
});

Route::get('registerman', function () {
    return View('auth/registerman');
});

Route::get('registersto', function () {
    return View('auth/registersto');
});

Route::post('/register_man', ['as' => 'register_man', 'uses' => 'Auth\ManufacturerController@register']);

Route::post('/register_sto', ['as' => 'register_sto', 'uses' => 'Auth\StoreController@register']);

Auth::routes();

// Routes for Authenticated Users Only
Route::group(['middleware' => 'auth'], function () {

    /* ----- Home Controller ----- */
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/filter/{id}', 'HomeController@filter')->name("dashboard/filter");

    //For enter function in Auto suggest
    Route::get('/filter', 'HomeController@filterEnter')->name("dashboard/filter");

    Route::get('/filterName/{id}', 'HomeController@filterName')->name("dashboard/filter");

    Route::get('/user/find', 'HomeController@searchUsers');

    /* ----- EditProfile Controller ----- */
    Route::get('/editProfile', 'EditProfileController@index')->name('editProfile');

    Route::post('/store_editProfile', ['as' => 'store_editProfile', 'uses' => 'EditProfileController@saveStore']);

    Route::post('/manu_editrofile', ['as' => 'manu_editProfile', 'uses' => 'EditProfileController@saveManu']);

    /* ----- History Controller ----- */
    Route::get('/history', 'HistoryController@index');

    /* ----- Opportunity Controller ----- */
    Route::get('/opportunities', 'OpportunityController@opportunityWithRanking')->name('opportunities');

    /* ----- SlowStock Controller ----- */
    Route::get('/slowstock', 'SlowStockController@index');

    /* ----- MyListings Controller ----- */
    Route::get('/mylistings', 'MyListingsController@index')->name('mylistings');

    // Delete Product
    Route::post('removeproduct', 'MyListingsController@remove')->name('mylistings');

    Route::post('update', 'MyListingsController@saveprod')->name('mylistings');

    /* ----- AddListings Controller ----- */
    Route::get('/addlistings', 'AddListingsController@index')->name('addlistings');

    Route::get('/addlistingFromSlow', 'AddListingsController@addFromSlow');

    //Add new product
    Route::post('create', 'AddListingsController@insert');

    //Autofill Product Type
    Route::get('/autofill/{id}', 'AddListingsController@autofillType')->name("Addlisting/");

    /* ----- AddNewProduct Controller ----- */
    Route::post('/createnewprod', ['as' => 'createnewprod', 'uses' => 'AddNewProductController@savenewprod']);

    Route::get('newprod', function () {
        return View('newprod');
    });

    /* ----- FormUpload Controller ----- */
    //File Upload
    Route::get('uploadchoose', function () {
        return View('uploadchoose');
    });

    Route::get('/upload', 'FormuploadController@index');

    Route::post('upload', 'FormuploadController@upload');

    /* ----- DownloadFile Controller ----- */
    Route::get('/downloads', 'DownloadFileController@download');

    /* ----- Cart Controller ----- */
    //Cart Index
    Route::get('/cart', 'CartController@index')->name('cart.index');

    // Add item to cart via get
    Route::get('/addToCart/{id}', 'CartController@addToCart')->name('cart.add-item');

    // Minus quantity function
    Route::post('/updateItem', 'CartController@updateItem')->name('cart.update');

    // Remove Item
    Route::get('/removeItem/{id}', 'CartController@removeItem')->name('cart.remove');

    // Clear Cart
    Route::get('/clearCart', 'CartController@clearCart')->name('cart.clear');

    /* ----- StripeCheckout Controller ----- */
    //Checkout Index
    Route::get('/checkout', 'StripeCheckoutController@index')->name('checkout.index');
    //Checkout function
    Route::get('/checkoutFinal', 'StripeCheckoutController@checkout')->name('checkout.final');

    /* ----- Login Controller ----- */
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});



