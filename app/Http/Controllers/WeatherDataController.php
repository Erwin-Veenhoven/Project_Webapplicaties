<?php

namespace App\Http\Controllers;

use App\Models\IncorrectWeatherData;
use App\Models\WeatherData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherDataController extends Controller
{
    private function correctWeatherData(IncorrectWeatherData $weatherData): IncorrectWeatherData
    {


        return $weatherData;
    }

    public function postWeatherData(Request $request)
    {
        $data = $request->json()->get('WEATHERDATA');
        $weatherData = new WeatherData();
        foreach ($data as $item) {
            $weatherData->stn    = $item['STN'] !== 'None' ? $item['STN'] : null;
            $weatherData->date   = $item['DATE'] !== 'None' ? $item['DATE'] : null;
            $weatherData->time   = $item['TIME'] !== 'None' ? $item['TIME'] : null;
            $weatherData->temp   = $item['TEMP'] !== 'None' ? $item['TEMP'] : null;
            $weatherData->dewp   = $item['DEWP'] !== 'None' ? $item['DEWP'] : null;
            $weatherData->stp    = $item['STP'] !== 'None' ? $item['STP'] : null;
            $weatherData->slp    = $item['SLP'] !== 'None' ? $item['SLP'] : null;
            $weatherData->visib  = $item['VISIB'] !== 'None' ? $item['VISIB'] : null;
            $weatherData->wdsp   = $item['WDSP'] !== 'None' ? $item['WDSP'] : null;
            $weatherData->prcp   = $item['PRCP'] !== 'None' ? $item['PRCP'] : null;
            $weatherData->sndp   = $item['SNDP'] !== 'None' ? $item['SNDP'] : null;
            $weatherData->frshtt = $item['FRSHTT'] !== 'None' ? $item['FRSHTT'] : null;
            $weatherData->cldc   = $item['CLDC'] !== 'None' ? $item['CLDC'] : null;
            $weatherData->wnddir = $item['WNDDIR'] !== 'None' ? $item['WNDDIR'] : null;

            // Validate and save weatherData
            $weatherData = $this->correctWeatherData($weatherData);
            $weatherData->save();
        }
    }

    public function showWeatherData()
    {
        Log::info('showWeatherData');
        $data = WeatherData::OrderBy('date', 'desc')->OrderBy('time', 'desc')->get();
        return view('monitor', ['data' => $data]);
    }

    public function showWeatherDataKey(Request $request)
    {
        $data = $request->input('sleutel');

    }
}
