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
            'title' => 'jai une erreur 500 lorque jexecute mon code en php',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est asperiores repudiandae dolor nostrum cupiditate iusto totam, quod atque modi alias consectetur, ipsam, maxime reiciendis fugiat repellendus quis corporis quia esse?m',
            'imgUrl' => 'https://cdn.futura-sciences.com/buildsv6/images/mediumoriginal/d/0/9/d09c24867c_50170596_erosion-soulevement-alpes.jpg',
            'is_resolved' => false,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('post_with_tags')->insert([
            'post_id' => 1,
            'tag_id' => 4
        ]);

        DB::table('posts')->insert([
            'title' => 'Quand je met une image que mon application mobile sa ne saffiche pas',
            'description' => 'Case felt the edge of the Villa bespeak a turning in, a denial of the bright void beyond the hull. His offices were located in a warehouse behind Ninsei, part of which seemed to move of their own accord, gliding with a luminous digital display wired to a subcutaneous chip. He’d waited in the shade beneath a bridge or overpass. Sexless and inhumanly patient, his primary gratification seemed to he in his jacket pocket. All the speed he took, all the turns he’d taken and the robot gardener. No sound but the muted purring of the previous century. None of that prepared him for the arena, the crowd, the tense hush, the towering puppets.',
            'imgUrl' => 'https://cdn.futura-sciences.com/buildsv6/images/mediumoriginal/d/0/9/d09c24867c_50170596_erosion-soulevement-alpes.jpg',
            'is_resolved' => false,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('post_with_tags')->insert([
            'post_id' => 2,
            'tag_id' => 5
        ]);

        DB::table('post_with_tags')->insert([
            'post_id' => 2,
            'tag_id' => 6
        ]);
    }
}
