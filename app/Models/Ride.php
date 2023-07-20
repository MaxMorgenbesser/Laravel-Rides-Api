<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;
    protected $fillable = ['start_location', 'end_location', 'request_time', 'dropoff_time', 'user_id'];
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function riders()
    {
        return $this->hasMany(\App\Models\Riders::class);
    }
}