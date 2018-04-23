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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/upload', 'uploadimage')->middleware('auth');
Route::post('/upload', 'GalleryController@uploadImage')->middleware('auth');

Route::get('/show', 'GalleryController@show')->middleware('auth');

Route::get('/soap', function() {
    $url = "http://currencyconverter.kowabunga.net/converter.asmx?WSDL";

    try {
        $client=new SoapClient($url);
        dd($client->GetConversionAmount( [
            'CurrencyFrom' => 'USD', 
            'CurrencyTo'   => 'EUR', 
            'RateDate'     => '2018-04-23', 
            'Amount'       => '1',
          ]));

    } catch(SoapFault $fault){
        echo "<br/>$fault";
    }
});