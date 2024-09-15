<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitTable extends Migration
{
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id', 100)->nullable();
            $table->string('doctor_id', 200)->nullable();
            $table->string('visit_reason', 100)->nullable();
            $table->string('visit_date', 100)->nullable();
            $table->string('consultation_fee', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
