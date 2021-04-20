<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([
            'name' => 'Genie Informatique',
            'description' => 'departement des informaticien',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departements')->insert([
            'name' => 'Genie Electrique et Informatique Industrielle',
            'description' => 'departement des industrielles',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departements')->insert([
            'name' => 'Genie Industrielle et Maintenance',
            'description' => 'departement des Maintenancier',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departements')->insert([
            'name' => 'Organisation et Gestion des Entreprise',
            'description' => 'departement des Gestionnaire',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departements')->insert([
            'name' => 'Genie Civil',
            'description' => 'departement des constructeur',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departements')->insert([
            'name' => 'Genie Logistique et Transport',
            'description' => 'departement des Gestionnaire de transport',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('departements')->insert([
            'name' => 'Genie Mecanique et Production',
            'description' => 'departement des Mecanicien',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
