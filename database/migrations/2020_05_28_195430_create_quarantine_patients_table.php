<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuarantinePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quarantine_patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id')->unique();
            $table->unsignedBigInteger('quarantine_address_id');
            $table->enum('covid_status',['HOME_QUARANTINED','INSTITUTE_QUARANTINED','POSITIVE','NEGATIVE','RECOVERED','DEAD']);
            $table->boolean('present_at_quarantine')->default(false);
            $table->text('remark')->nullable();

            $table->date('quarantined_at')->nullable();
            $table->date('known_positive_at')->nullable();
            $table->date('known_negative_at')->nullable();
            $table->date('recovered_at')->nullable();
            $table->date('died_at')->nullable();

            $table->timestamps();
            $table->softDeletes();


            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreign('quarantine_address_id')->references('id')->on('quarantine_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quarantine_patients');
    }
}
