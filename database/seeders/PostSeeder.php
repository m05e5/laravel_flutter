<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Je narrive pas a resoudre l\'exercise sur les tangantes',
            'description' => 'Jai un problem avec les functions trigonometrique. et je narrive pas a faire la troisiemme question de cette feuille. en faite je ne metrise pas bien les formes de base',
            'imgUrl' => 'https://www.math-exercises.com/images/math-exercises/exercises/050%20Trigonometry%20and%20trigonometric%20expressions%2004.png',
            'is_resolved' => false,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('post_with_tags')->insert([
            'post_id' => 1,
            'tag_id' => 13
        ]);

        DB::table('post_with_tags')->insert([
            'post_id' => 1,
            'tag_id' => 14
        ]);

        DB::table('posts')->insert([
            'title' => 'Jai un problem avec ma function javascript. sa ne donne pas',
            'description' => 'Tout donnais dabord bien jutilisait le DOM manipulation et je cree mes functions JavaScript sans problem mais je ne comprend pas apres voir ajouter la function si mon code ne marche plus. svp qui peut maider',
            'imgUrl' => 'https://i.stack.imgur.com/vq40S.png',
            'is_resolved' => false,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('post_with_tags')->insert([
            'post_id' => 2,
            'tag_id' => 1
        ]);


    }
}
