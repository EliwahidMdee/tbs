<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionTable extends Migration
{
    public function up()
    {
        Schema::create('prescription', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id', 100)->nullable();
            $table->string('medication_name', 200)->nullable();
            $table->string('dosage', 100)->nullable();
            $table->string('duration', 100)->nullable();
            $table->string('price', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prescription');
    }
}
