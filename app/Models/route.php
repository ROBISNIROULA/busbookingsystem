<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;
    protected $table='routes';
    protected $fillable = [
        'source',
        'destination',
        'created_by',
        'status',
    ];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Category
    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }
}
