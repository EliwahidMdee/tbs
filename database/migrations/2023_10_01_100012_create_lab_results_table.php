<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabResultsTable extends Migration
{
    public function up()
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id', 100)->nullable();
            $table->string('test_id', 100)->nullable();
            $table->string('result_text', 100)->nullable();
            $table->string('visit_id', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Lab_Results');
    }
}
