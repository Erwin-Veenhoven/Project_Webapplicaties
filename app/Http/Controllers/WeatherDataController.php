<?php

namespace App\Http\Controllers;

use App\Models\IncorrectWeatherData;
use App\Models\WeatherData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherDataController extends Controller
{
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
        $data = WeatherData::OrderBy('date', 'desc')->OrderBy('time', 'desc')->get();
        return view('monitor', ['data' => $data]);
    }

    public function showWeatherDataKey(Request $request)
    {
        $key = $request->input('key');
        $data = WeatherData::where('stn', $key)->OrderBy('date', 'desc')->OrderBy('time', 'desc')->get();
        return view('monitor', ['data' => $data]);

    }


    /**
     * Corrects the weather data if it's wrong and stores the wrong data in the database.
     * @param WeatherData $weatherData The weather data to correct.
     * @return WeatherData The corrected weather data.
     */
    private function correctWeatherData(WeatherData $weatherData): WeatherData
    {
        $entries = $this->getLastEntries($weatherData->stn);
        if (count($entries) <= 2) return $weatherData;

        $incorrectFields = $this->getIncorrectFields($weatherData, $entries);
        if (count($incorrectFields) > 0) {
            $this->saveIncorrectWeatherData($weatherData);
            $this->correctFields($weatherData, $incorrectFields, $entries);
        }

        return $weatherData;
    }

    /**
     * Safe the incorrect data in the database.
     * @param WeatherData $weatherData Weather data to safe.
     * @return void
     */
    private function saveIncorrectWeatherData(WeatherData $weatherData): void
    {
        $incorrectData = new IncorrectWeatherData();
        $attributes = $weatherData->getAttributes();
        $incorrectData->setRawAttributes($attributes);
        $incorrectData->save();
    }

    /**
     * Returns all the incorrect fields in weather data.
     * @param WeatherData $weatherData The weather data to check.
     * @return string[] All the incorrect fields.
     */
    private function getIncorrectFields(WeatherData $weatherData, Collection $entries): array
    {
        $incorrectFields = [];

        foreach ($weatherData->getAttributes() as $column => $value) {
            // Check for null values
            if (is_null($value)) {
                $incorrectFields[] = $column;
                continue;
            }

            // Check temp
            if ($column === "temp" && !$this->checkTemp($weatherData->temp, $entries)) {
                $incorrectFields[] = "temp";
            }
        }

        return $incorrectFields;
    }

    /**
     * Gets the last 30 entries from a specific station.
     * @param string $station The station to get the entries from.
     * @return Collection The last 30 entries from the station.
     */
    private function getLastEntries(int $station): Collection {
        return WeatherData::where('stn', $station)
            ->orderBY('date', 'desc')
            ->orderBy('time', 'desc')
            ->take(30)
            ->get();
    }

    /**
     * @param int $temp The temperature to check.
     * @param Collection $entries The last 30 entries from the station.
     * @return bool True if temp is correct, false otherwise.
     */
    private function checkTemp(int $temp, Collection $entries): bool {
        $temps = $entries->pluck('temp')->toArray();
        $extrapolatedTemp = $this->extrapolate($temps);
        return abs($temp - $extrapolatedTemp) <= 5;
    }

    /**
     * @param WeatherData $weatherData The data to correct.
     * @param array $incorrectFields The names of the fields to correct.
     * @param Collection $entries The last 30 entries of the station.
     * @return void
     */
    private function correctFields(WeatherData $weatherData, array $incorrectFields, Collection $entries): void
    {
        $attributes = $weatherData->getAttributes();
        foreach ($incorrectFields as $field) {
            $attributes[$field] = match ($field) {
                "temp" => $this->correctTemp($attributes[$field], $entries),
                "frshtt" => $this->correctFRSHTT($entries),
                default => $this->correctValue($field, $entries),
            };
        }
        $weatherData->setRawAttributes($attributes);
    }

    /**
     * Corrects temperature to extrapolated values of entries with specific offset.
     * @param float|null $temp The temperature to correct.
     * @param Collection $entries The entries to extrapolate.
     * @return float The corrected value.
     */
    private function correctTemp(?float $temp, Collection $entries): float
    {
        $temps = $entries->pluck('temp')->toArray();
        $extrapolatedTemp = $this->extrapolate($temps);

        if (is_null($temp)) return $extrapolatedTemp;
        if ($temp < $extrapolatedTemp - 5) return $extrapolatedTemp - 5;
        if ($temp > $extrapolatedTemp + 5) return $extrapolatedTemp + 5;
        return $temp;
    }

    /**
     * Corrects the FRSHTT string to extrapolated values of entries.
     * @param Collection $entries The entries to extrapolate.
     * @return string The corrected value.
     */
    private function correctFRSHTT(Collection $entries): string
    {
        $values = $entries->pluck('frshtt')->toArray();
        $frshtt = "";
        for ($i = 0; $i < 6; $i++) {
            $binValues = [];
            foreach ($values as $value) {
                $binValues[] = (float)$value[$i];
            }
            $frshtt .= (int)$this->extrapolate($binValues);
        }
        return $frshtt;
    }

    /**
     * Corrects a value to extrapolated values of entries.
     * @param string $fieldName The fieldname of the value.
     * @param Collection $entries The entries to extrapolate.
     * @return int|float The corrected value.
     */
    private function correctValue(string $fieldName, Collection $entries): int|float
    {
        $values = $entries->pluck($fieldName)->toArray();
        $type = gettype($values[0]);
        $value = $this->extrapolate($values);
        return settype($value, $type);
    }

    private function extrapolate(array $values): float {
        $n = count($values);
        if ($n < 2 || $n > 30) {
            throw new InvalidArgumentException("The input array must contain between 2 and 30 values");
        }

        $sum_x = $sum_y = $sum_xy = $sum_x2 = 0;
        for ($i = 0; $i < $n; $i++) {
            $sum_x += $i + 1;
            $sum_y += $values[$i];
            $sum_xy += ($i + 1) * $values[$i];
            $sum_x2 += ($i + 1) * ($i + 1);
        }

        $slope = ($n * $sum_xy - $sum_x * $sum_y) / ($n * $sum_x2 - $sum_x * $sum_x);
        $y_intercept = ($sum_y - $slope * $sum_x) / $n;

        return $slope * ($n + 1) + $y_intercept;
    }
}
