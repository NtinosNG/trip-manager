<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_trip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('passenger_id')->unsigned();
            $table->bigInteger('trip_id')->unsigned();
            $table->timestamps();
            
            $table->unique(['passenger_id', 'trip_id']);

            $table->foreign('passenger_id')->references('id')->on('passengers') ->onDelete('cascade');
            $table->foreign('trip_id')->references('id')->on('trips') ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passenger_trip');
    }
}
