<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DefiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array("web_client", "web_serveur", "linux");
        DB::table('defis')->insert([
            'title' => Str::random(10),
            'description' => Str::random(50),
            'password' => Hash::make('password'),
            'category' => $categories[array_rand($categories)],
            'level' => rand(1,5),
            'link' => "http://".Str::random(10).".com",
            'created_at' => time()
        ]);
    }
}
