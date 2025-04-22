<?php

use App\Models\price;
use App\Models\Seat;
use App\Models\User;
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
    public function bus()
{
    return $this->belongsTo(Bus::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
public function Seat()
{
    return $this->belongsTo(Seat::class);
}
public function route()
{
    return $this->belongsTo(Route::class);
}
public function price()
{
    return $this->belongsTo(price::class);
}
};
