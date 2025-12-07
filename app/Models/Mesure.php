<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    
     public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /** @use HasFactory<\Database\Factories\MesureFactory> */
    use HasFactory;
}
