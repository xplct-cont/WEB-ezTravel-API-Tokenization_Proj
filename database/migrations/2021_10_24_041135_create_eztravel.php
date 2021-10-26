<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEztravel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eztravel', function (Blueprint $table) {
            $table->id();      
            $table->string('origin', 255);
            $table->string('destination', 255);
            $table->bigInteger('flight_no')->unsigned();
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->string('passenger_name', 255);
            $table->integer('age');
            $table->string('travel_class', 30);


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
        Schema::dropIfExists('eztravel');
    }
}
