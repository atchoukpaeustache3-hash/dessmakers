<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apprenti extends Model
{
    protected $fillable = [
    'nom',
    'prenom',
    'sexe',
    'date_naissance',
    'date_debut_apprentissage',
    'date_fin_apprentissage',
    'duree_formation',
    'adresse',
    'niveau_etude',
    'option',
    'montant_contrat',
    'avance_paye',
    'reste_a_payer',
    'numero_parent',
    'photo',
    'status',
];

}
