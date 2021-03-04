<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(SchoolClassSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentsSeeder::class);
    }
}
