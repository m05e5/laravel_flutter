<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'JavaScript',
            'description' => 'Its a programming language',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'C++',
            'description' => 'Its a programming language',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'PHP',
            'description' => 'Its a programming language mostly used for databases',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Dart',
            'description' => 'Its a programming language',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Flutter',
            'description' => 'Its a Framework userd for mobile applications',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Mobile',
            'description' => 'Its a Framework userd for mobile applications',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Laravel',
            'description' => 'Its a PHP framework',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Security',
            'description' => 'Nothing to say',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'DataBase',
            'description' => 'Nothing to say',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Python',
            'description' => 'Its a programming language mostly used for databases',
            'departement_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Authomatisme',
            'description' => 'Ces pour les electricien',
            'departement_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Asservicement',
            'description' => 'Ces pour les electricien',
            'departement_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Math',
            'description' => 'Ces pour les electricien',
            'departement_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Algebre numerique',
            'description' => 'Ces pour les electricien',
            'departement_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('tags')->insert([
            'name' => 'Electronique',
            'description' => 'Ces pour les electricien',
            'departement_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
