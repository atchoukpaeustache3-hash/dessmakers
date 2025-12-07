<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function mesures()
    {
        return $this->hasMany(mesure::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory;
}
