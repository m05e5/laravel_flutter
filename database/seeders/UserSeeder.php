<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Caleb Moses',
            'imgProfile' => 'https://i.unimedias.fr/2015/01/19/Kristina-9-ans-la-plus-belle-petite-fille-du-monde.jpg?auto=format%2Ccompress&cs=tinysrgb',
            'email' => 'calebmoses1111@gmail.com',
            'matricule' => '18i00933',
            'password' => Hash::make('12345678'),
            'filiere' => 'Genie Logiciel',
            'role' => 'student',
            'departement_id' => 1,
            'question_asked' => 1,
            'question_answered' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('users')->insert([
            'name' => 'Asuna Yuuki',
            'imgProfile' => 'https://cache.magicmaman.com/data/photo/w1000_ci/5y/petite-fille-qui-sourit1.jpg',
            'email' => 'asunayuki@gmail.com',
            'matricule' => '18i00934',
            'password' => Hash::make('12345678'),
            'filiere' => 'OGA',
            'role' => 'student',
            'departement_id' => 4,
            'question_asked' => 2,
            'question_answered' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Harima Kosei',
        //    'pseudo' => 'yuki',
            'email' => 'harimakosei@gmail.com',
            'matricule' => '18i00935',
            'password' => Hash::make('12345678'),
            'filiere' => 'Genie Logiciel',
            'role' => 'student',
            'departement_id' => 1,
            'question_asked' => 1,
            'question_answered' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
