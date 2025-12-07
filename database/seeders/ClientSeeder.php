<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('clients')->insert([
            [
                'name'           => 'Jean',
                'lastname'       => 'Dupont',
                'phone'          => '97000001',
                'profession'     => 'Couturier',
                'adresse'        => 'Cotonou',
                'sexe'           => 'homme',
                'email'          => 'jean.dupont@example.com',
                'date_naissance' => '1990-05-12',
                'photo'          => null,
                'date_venue'     => '2025-01-10',
                'user_id'        => 1, 
            ],
            [
                'name'           => 'Aline',
                'lastname'       => 'Kossi',
                'phone'          => '97000002',
                'profession'     => 'Secrétaire',
                'adresse'        => 'Porto-Novo',
                'sexe'           => 'femme',
                'email'          => null,
                'date_naissance' => null,
                'photo'          => null,
                'date_venue'     => '2025-01-12',
                'user_id'        => 1,
            ],
        ]);
    }
}
