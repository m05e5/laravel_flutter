<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comments')->insert([
            'content' => 'en fait comme jai vue un poste bannal comme ca jai decider de fiar un poste des plus banal ',
            'post_id' => 1,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'content' => 'ces drole parce que moi meme jai vue et jai decider de faire la meme chose ',
            'post_id' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'content' => 'Voila ces cool et si on jouait a un jeu; tous quon va dire on le fait en japonais',
            'post_id' => 1,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'content' => 'ouais ces cool',
            'post_id' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'content' => 'je commence: conichiwa mina san watatshmo ni otaku yoroshko onegaishimasu',
            'post_id' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'content' => 'Yo ohayo watatshimo furansu ni sumu ;) ',
            'imgUrl' => 'https://www.learninsta.com/wp-content/uploads/2020/11/NCERT-Solutions-for-Class-10-Maths-Chapter-8-Introduction-to-Trigonometry-Ex-8.4-5.png',
            'post_id' => 1,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        DB::table('comments')->insert([
            'content' => 'je sais pas si sa peut taider mais essaye de voir tes controller ou tes migration il  ya une movaise connection avec la BD',
            'post_id' => 1,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('comments')->insert([
            'content' => 'ok ok merci je vais esseyer',
            'post_id' => 1,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
