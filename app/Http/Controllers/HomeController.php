<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
    $minutes = 60;
    $forecast = Cache::remember('forecast', $minutes, function () {
        Log::info("Not from cache");
        $app_id = config("here.app_id");
        $app_code = config("here.app_code");
        $lat = config("here.lat_default");
        $lng = config("here.lng_default");
        $url = "https://weather.ls.hereapi.com/weather/1.0/report.json?apiKey=m1cIXCFvWJcQlu0xPi2kvajHxjwV9UHA0esiSsHaMzU&product=forecast_7days_simple&latitude=41.83&longitude=-87.68";
        Log::info($url);
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url);
        if ($res->getStatusCode() == 200) {
        $j = $res->getBody();
        $obj = json_decode($j);
        //$forecast = $obj->hourlyForecasts->forecastLocation;
        $forecast = $obj;
        }
        return $forecast;
        //dd($forecast->dailyForecasts->forecastLocation);
    });
    return view('forecastview', ["forecast" => $forecast]);
    }
}

