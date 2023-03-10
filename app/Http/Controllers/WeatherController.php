<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Dnsimmons\OpenWeather\OpenWeather;

class WeatherController extends Controller
{
    function index() {
        $weather = new OpenWeather();
        $current = $weather->getCurrentWeatherByPostal('02111');
        return  Inertia::render('Weather',[
            'weather' => $current
        ]);
    }
}
