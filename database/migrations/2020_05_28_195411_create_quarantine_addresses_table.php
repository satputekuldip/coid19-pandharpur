<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuarantineAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarantine_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type',['INSTITUTE','HOME']);
            $table->string('name');
            $table->string('phone');
            $table->bigInteger('state_id');
            $table->string('state');
            $table->bigInteger('district_id');
            $table->string('district');
            $table->bigInteger('tahasil_id');
            $table->string('tahasil');
            $table->string('address');
            $table->string('pincode',6);


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
        Schema::dropIfExists('quarantine_addresses');
    }
}
