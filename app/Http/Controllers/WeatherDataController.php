<?php

namespace App\Http\Controllers;

use App\Models\WeatherData;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherDataController extends Controller
{
    public function postWeatherData(Request $request)
    {
        $data = $request->json()->all();
        $data = $data['WEATHERDATA'];
        $weatherData = new WeatherData();
        for($i = 0; $i < count($data); $i++) {
            $weatherData->stn = $data[$i]['STN'];
            $weatherData->date = $data[$i]['DATE'];
            $weatherData->time = $data[$i]['TIME'];
            $weatherData->temp = $data[$i]['TEMP'];
            $weatherData->dewp = $data[$i]['DEWP'];
            $weatherData->stp = $data[$i]['STP'];
            $weatherData->slp = $data[$i]['SLP'];
            $weatherData->visib = $data[$i]['VISIB'];
            $weatherData->wdsp = $data[$i]['WDSP'];
            $weatherData->prcp = $data[$i]['PRCP'];
            $weatherData->sndp = $data[$i]['SNDP'];
            $weatherData->frshtt = $data[$i]['FRSHTT'];
            $weatherData->cldc = $data[$i]['CLDC'];
            $weatherData->wnddir = $data[$i]['WNDDIR'];
        }
        $weatherData->save();

    }

    public function showWeatherData()
    {
        Log::info('showWeatherData');
        $data = WeatherData::OrderBy('date', 'desc')->OrderBy('time', 'desc')->take(10)->get();
        return view('monitor', ['data' => $data]);
    }
}
