<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;

class WeatherController extends Controller
{
    public function check(Request $request)
    {
        $city = $request->input('city');
        $response = Http::get('http://api.openweathermap.org/data/2.5/forecast', [
            'q' => $city,
            'appid' => 'dbb36aa917990a477ea1094052f9f1c8',
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            //convert the weather data included in 'list' array into JSON format
            $weatherData = $response->json()['list'];

            $dailyData = []; // this array will hold the forecast data grouped by day
            foreach ($weatherData as $data) {
                //the timestamp from the data is being converted into a date string using the Carbon library. the startOfDay method is being used to remove the time from the date.
                $date = Carbon::createFromTimestamp($data['dt'])->startOfDay()->toDateString();
                if (!array_key_exists($date, $dailyData)) {
                    //the key is the data, the value is an array containing the temperature, a count and an array with the weather descritpion
                    $dailyData[$date] = [
                        'temp_sum' => $data['main']['temp'],
                        'count' => 1,
                        'descriptions' => [$data['weather'][0]['description']]
                    ];
                } else {
                    $dailyData[$date]['temp_sum'] += $data['main']['temp'];
                    $dailyData[$date]['count']++;
                    $dailyData[$date]['descriptions'][] = $data['weather'][0]['description'];
                }
            }

            $dailyForecast = [];
            foreach ($dailyData as $date => $data) {
                $dailyForecast[] = [
                    'date' => $date,
                    'avg_temp' => number_format($data['temp_sum'] / $data['count'], 2),
                    'description' => array_unique($data['descriptions'])
                ];
            }

            return back()->with([
                'daily_forecast' => $dailyForecast,
                'city' => $city
            ]);
        } else {
            return back()->withErrors('Could not retrieve weather data.');
        }
    }
}
