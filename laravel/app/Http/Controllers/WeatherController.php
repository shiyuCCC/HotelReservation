<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function check(Request $request)
    {
        $city = $request->input('city');
        $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => 'dbb36aa917990a477ea1094052f9f1c8',
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
            $temperature = $weatherData['main']['temp'];
            $weatherDescription = $weatherData['weather'][0]['description'];

            return back()->with([
                'weather' => 'The current weather in ' . $city . ' is ' . $temperature . '°C with ' . $weatherDescription . '.'
            ]);
        } else {
            return back()->withErrors('Could not retrieve weather data.');
        }
    }
}
