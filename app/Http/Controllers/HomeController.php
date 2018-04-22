<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soapWrapper = new SoapWrapper();
        $soapWrapper->add('Service', function ($service) {
            $service
              ->wsdl('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
          });

        $result = $soapWrapper->call('Service.ListOfContinentsByName');
        $array = json_decode(json_encode($result), true);
        $conts = $array['ListOfContinentsByNameResult']['tContinent'];
        
        foreach($conts as $continent) {
            $continents[] = $continent['sName'];
        }
          
        return view('home')->with('continents', $continents);
    }
}
