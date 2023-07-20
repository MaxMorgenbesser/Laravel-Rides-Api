<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riders extends Model
{

    protected $fillable = ['user_id'];
    use HasFactory;

   public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function ride () {
        return $this->belongsTo(\App\Models\Ride::class);
    }

}