<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->enum('gender',['MALE','FEMALE','OTHER']);
            $table->integer('age');
            $table->string('mobile',10);

            $table->bigInteger('state_id');
            $table->string('state');
            $table->bigInteger('district_id');
            $table->string('district');
            $table->bigInteger('tahasil_id');
            $table->string('tahasil');
            $table->string('pincode',6);
            $table->string('current_address');

            $table->boolean('permission_to_enter');
            $table->boolean('have_medical_certificate');

            $table->bigInteger('entry_point_id');
            $table->string('entry_point');

            $table->string('health_condition');


            $table->enum('covid_status',['QUARANTINED','POSITIVE','NEGATIVE','RECOVERED','DEAD']);
            $table->boolean('present_at_quarantine')->default(false);

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
        Schema::dropIfExists('patients');
    }
}
