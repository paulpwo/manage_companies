<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    // use HasFactory;
    protected $fillable = [
        'firt_name',
        'last_name',
        'email',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}
