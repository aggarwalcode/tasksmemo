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

Route::get('/',[
'as' => 'home',
'uses' => 'PagesController@home'
]);
Route::get('/paypal', 'PayPalController@index');

Route::post('paypal', 'PayPalController@payWithpaypal');
Route::get('status', 'PayPalController@getPaymentStatus');
Route::get('search', [
	'as' => 'search', 
	'uses' => 'SearchController@search'
]);
Route::get('OrderDetails', [
	'as' => 'orderPage', 
	'uses' => 'OrderPageController@orderPage'
]);
Route::get('verify',function(){
	return "form is submitted <br> ID:".$_GET['txtid'].$_GET['txtname'];
});
/*Route::get('paypalform',function(){
	return view('pages.paypalform');
});*/
Route::get('payment-cancelled',function(){
	return view('pages.payment-cancelled');
});
Route::get('payment-cancelled.html',function(){
	return view('pages.payment-cancelled');
});
Route::get('payment-successful',function(){
	return view('pages.payment-successful');
});
Route::get('payment-successful.html',function(){
	return view('pages.payment-successful');
});

/*Route::get('search', function () {

    $data['games'] = ['Gradius', 'Kirbys Adventure', 'Pac-Man'];
    $data['publishers'] = ['Konami', 'Nintendo', 'Bandai Namco'];

    return view('pages.search', $data);
});*/