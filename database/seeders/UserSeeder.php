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
            'imgProfile' => 'https://firebasestorage.googleapis.com/v0/b/soutenence.appspot.com/o/postImages%2F937125hg6.jpg?alt=media&token=99eb084a-7376-4808-8084-218769cf402a',
            'email' => 'calebmoses1111@gmail.com',
            'matricule' => '18i00933',
            'password' => Hash::make('12345678'),
            'filiere' => 'Genie Logiciel',
            'role' => 'student',
            'departement_id' => 1,
            'question_asked' => 1,
            'question_answered' => 6,
            'level' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('users')->insert([
            'name' => 'John Doe',
            'imgProfile' => 'https://cache.magicmaman.com/data/photo/w1000_ci/5y/petite-fille-qui-sourit1.jpg',
            'email' => 'johndoe@gmail.com',
            'matricule' => '18i00934',
            'password' => Hash::make('12345678'),
            'filiere' => 'OGA',
            'role' => 'student',
            'departement_id' => 4,
            'question_asked' => 2,
            'question_answered' => 4,
            'Level' => 1,
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
            'Level' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
