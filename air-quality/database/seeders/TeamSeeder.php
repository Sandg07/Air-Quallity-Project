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
                'avatar' => "",
                'title' => 'Web Developer',
                'about' => "",
                'github_account' =>  ""
            ]
        );

        DB::table('teams')->insert([
            'first_name' =>  'Catiana',
            'last_name' => 'Meyer Miranda',
            'avatar' => "",
            'title' => 'Web Developer',
            'about' => "",
            'github_account' =>  ""
        ]);

        DB::table('teams')->insert([
            'first_name' =>  'Paul',
            'last_name' => 'Lallemand',
            'avatar' => "",
            'title' => 'Frontend Web Developer',
            'about' => "",
            'github_account' =>  ""
        ]);
    }
}
