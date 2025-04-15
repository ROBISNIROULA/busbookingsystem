<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;
    protected $table='route';
    protected $fillable = [
        'title',
        'description',
        'price',
        'created_by',
        'category_id',
        'status',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
