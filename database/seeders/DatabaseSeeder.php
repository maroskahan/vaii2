<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Article::factory(10)->create();
        //App\Models\User::factory(30)->create();
        \App\Models\Page::factory(6)->create();
    }
}
