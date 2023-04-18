<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $table = 'station';
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'longitude',
        'latitude',
        'elevation',
    ];

    public function geolocations()
    {
        return $this->hasMany(Geolocation::class, 'station_name', 'name');
    }

    public function nearestlocations()
    {
        return $this->hasMany(Nearestlocation::class, 'station_name', 'name');
    }
}
