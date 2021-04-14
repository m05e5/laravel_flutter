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
            'first_name' => 'Caleb Moses',
            'last_name' => 'HYMELE TCHELIBOU',
            'email' => 'calebmoses1111@gmail.com',
            'matricule' => '18i00933',
            'password' => Hash::make('12345678'),
            'filiere' => 'Genie Logiciel',
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('users')->insert([
            'first_name' => 'Yuuki',
            'last_name' => 'Asuna',
            'email' => 'asunayuki@gmail.com',
            'matricule' => '18i00934',
            'password' => Hash::make('12345678'),
            'filiere' => 'Genie Logiciel',
            'role' => 'student',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
