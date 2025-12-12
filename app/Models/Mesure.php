<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    protected $fillable = [
    'client_id',
    'encolure',
    'tr_poitrine',
    'tr_sous_poitrine',
    'tr_taille',
    'tr_bassin',
    'tr_cuisse',
    'tr_ceinture',
    'tr_bras',
    'tr_manche',
    'tr_bas',
    'tr_tete',
    'hr_poitrine',
    'hr_sous_poitrine',
    'lg_epaule',
    'lg_taille',
    'lg_taille_dos',
    'lg_manche',
    'lg_pantalon',
    'lg_genoux',
    'lg_chemise',
    'carrure_devant',
    'carrure_dos',
    'demi_dos',
];

    
     public function client()
    {
        return $this->belongsTo(Client::class);
    }
    /** @use HasFactory<\Database\Factories\MesureFactory> */
    use HasFactory;
}
