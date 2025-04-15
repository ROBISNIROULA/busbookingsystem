<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $table='seats';
    protected $fillable=[
        'name',
        'created_by',
        'seat_number',
        'updated_by',
    ];
     // Relationship with User (creator)
     public function creator()
     {
         return $this->belongsTo(User::class, 'created_by');
     }
}
