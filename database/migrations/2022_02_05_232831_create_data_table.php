<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik');
            $table->text('address');
            $table->string('neighbourhood_id');
            $table->string('number_of_kk');
            $table->foreignId('religion_id');
            $table->foreignId('gender_id');
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->foreignId('status_id');
            $table->string('proffesion');
            $table->foreignId('state_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
