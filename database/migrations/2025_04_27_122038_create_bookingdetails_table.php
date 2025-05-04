<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookingdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uesr_id')->constrained('users', 'id');
            $table->foreignId('seat_id')->constrained('seats', 'id');
            $table->foreignId('route_id')->constrained('routes', 'id');
            $table->foreignId('price_id')->constrained('prices', 'id');
            $table->dateTime('booked_date');
            $table->foreignId('bus_id')->constrained('buses', 'id');
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
        Schema::dropIfExists('bookingdetails');
    }
};
