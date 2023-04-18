<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncorrectWeatherData extends Model
{
    use HasFactory;

    protected $table = 'incorrect_weather_data';

    protected $fillable = [
        'stn',
        'date',
        'time',
        'temp',
        'dewp',
        'stp',
        'slp',
        'visib',
        'wdsp',
        'prcp',
        'sndp',
        'frshtt',
        'cldc',
        'wnddir'
    ];
}
