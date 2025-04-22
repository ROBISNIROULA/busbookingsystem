<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $table='buses';
    protected $fillable=[
        'name',
        'created_by',
        'bus_number',
        'status',
        'category_id'
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

