<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('incorrect_weather_data', function (Blueprint $table) {
            $table->id();
            $table->integer('stn')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->float('temp')->nullable();
            $table->float('dewp')->nullable();
            $table->float('stp')->nullable();
            $table->float('slp')->nullable();
            $table->float('visib')->nullable();
            $table->float('wdsp')->nullable();
            $table->float('prcp')->nullable();
            $table->float('sndp')->nullable();
            $table->string('frshtt')->nullable();
            $table->float('cldc')->nullable();
            $table->integer('wnddir')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incorrect_weather_data');
    }
};
