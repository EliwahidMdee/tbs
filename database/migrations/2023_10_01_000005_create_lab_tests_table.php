<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestsTable extends Migration
{
    public function up()
    {
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->id('test_id');
            $table->string('test_name', 100)->notNullable();
            $table->decimal('test_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lab_tests');
    }
}
