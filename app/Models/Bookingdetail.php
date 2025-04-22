<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookingdetail extends Model
{
    use HasFactory;
    protected $table='bookingdetails';
    protected $fillable=[
        'user_id',
        'seat_id',
        'route_id',
        'price_id',
        'booked date',
        'bus_id',
        'status',
    ];
    public function uesr()
    {
        return $this->belongsTo(user::class, 'uesr_id');
    }
    public function seat()
    {
        return $this->belongsTo(seat::class, 'seat_id');
    }
    public function route()
    {
        return $this->belongsTo(route::class, 'route_id');
    }
    public function price()
    {
        return $this->belongsTo(price::class, 'price_id');
    }
    public function bus()
    {
        return $this->belongsTo(bus::class, 'bus_id');
    }
}
