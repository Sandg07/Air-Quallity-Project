<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert in DB Teams
        DB::table('teams')->insert(
            [
                'first_name' =>  'Sandrine',
                'last_name' => 'Gardini - Viger',
                'avatar' => "/assets/sandrine.png",
                'title' => 'Web Developer',
                'about' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore aut velit impedit expedita eaque suscipit consequatur quibusdam consequuntur, odio consectetur, quod quas. Tempore vitae facilis minus consequatur dolores debitis sequi.",
                'github_account' =>  "https://github.com/Sandg07"
            ]
        );

        DB::table('teams')->insert([
            'first_name' =>  'Catiana',
            'last_name' => 'Meyer Miranda',
            'avatar' => "/assets/sandrine.png",
            'title' => 'Web Developer',
            'about' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore aut velit impedit expedita eaque suscipit consequatur quibusdam consequuntur, odio consectetur, quod quas. Tempore vitae facilis minus consequatur dolores debitis sequi.",
            'github_account' =>  "https://github.com/catianamm"
        ]);

        DB::table('teams')->insert([
            'first_name' =>  'Paul',
            'last_name' => 'Lallemand',
            'avatar' => "/assets/paulAvatar.png",
            'title' => 'Web Developer',
            'about' => "Paul's 29 years old and can't stop to talk about music Inventore aut velit impedit expedita eaque suscipit consequatur quibusdam consequuntur, odio consectetur, quod quas. Tempore vitae facilis minus consequatur dolores debitis sequi.",
            'github_account' =>  "https://github.com/PaulL92"
        ]);
    }
}
