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
            'name' => 'C',
            'description' => 'Its a programming language',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'C#',
            'description' => 'Its a programming language mostly used for games',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'C++',
            'description' => 'Its a programming language',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'PHP',
            'description' => 'Its a programming language mostly used for databases',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Python',
            'description' => 'Its a programming language mostly used for databases',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Authomatisme',
            'description' => 'Ces pour les electricien',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Asservicement',
            'description' => 'Ces pour les electricien',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Math',
            'description' => 'Ces pour les electricien',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tags')->insert([
            'name' => 'Algebre numerique',
            'description' => 'Ces pour les electricien',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('tags')->insert([
            'name' => 'Electronique',
            'description' => 'Ces pour les electricien',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
