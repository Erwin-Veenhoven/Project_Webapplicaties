<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->string('name', 10)->primary();
            $table->float('longitude');
            $table->float('latitude');
            $table->float('elevation');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stations');
    }
};
