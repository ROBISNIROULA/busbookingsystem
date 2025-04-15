<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $fillable = ([
        'name',
        'mobile',
        'address',
        'dob',
        'status',
    ]);
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
