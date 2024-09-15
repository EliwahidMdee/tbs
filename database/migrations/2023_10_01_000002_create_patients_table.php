<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
public function up()
{
Schema::create('patients', function (Blueprint $table) {
$table->id();
$table->string('first_name');
$table->string('last_name');
$table->date('date_of_birth');
$table->string('gender');
$table->string('phone_number');
$table->string('address')->nullable();
$table->string('email')->nullable();
$table->string('marital_status')->nullable();
$table->string('nationality')->nullable();
$table->string('occupation')->nullable();
$table->text('drug_allergies')->nullable();
$table->text('food_allergies')->nullable();
$table->foreignId('doctor_id')->nullable()->constrained()->onDelete('cascade');
$table->timestamps();
});
}

public function down()
{
Schema::dropIfExists('patients');
}
}
