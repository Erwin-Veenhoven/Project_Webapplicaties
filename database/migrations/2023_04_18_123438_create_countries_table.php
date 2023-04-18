<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->string('country_code', 2)->primary();
            $table->string('country', 45);
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
