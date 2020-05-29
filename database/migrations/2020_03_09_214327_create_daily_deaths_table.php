<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyDeathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_deaths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('recorded_date');
            $table->bigInteger('deaths');
            $table->bigInteger('change_in_day');
            $table->bigInteger('change_in_day_percent');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_deaths');
    }
}
