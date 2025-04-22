<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class price extends Model
{
    use HasFactory;
    protected $table = 'price';

    protected $fillable = [
        'route_id',
        'amount',
        'category_id',
        'status',
    ];

    // Relationship with User (creator)
    public function route()
    {
        return $this->belongsTo(User::class, 'route_id');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
