<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        $this->call(MtypeSeeder::class);
        $this->call(McriteriaSeeder::class);
        $this->call(MsubcriteriaSeeder::class);
        $this->call(MalternativeSeeder::class);
    }
}
