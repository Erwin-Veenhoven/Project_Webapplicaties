<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nearestlocations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('station_name', 10);
            $table->string('name', 100)->nullable();
            $table->string('administrative_region1', 100)->nullable();
            $table->string('administrative_region2', 100)->nullable();
            $table->string('country_code', 2);
            $table->float('longitude');
            $table->float('latitude');

            /*$table->foreign('station_name')
                ->references('name')
                ->on('stations')
                ->onDelete('cascade');

            $table->foreign('country_code')
                ->references('country_code')
                ->on('countries');*/
        });
    }

    public function down()
    {
        Schema::dropIfExists('nearestlocations');
    }
};
