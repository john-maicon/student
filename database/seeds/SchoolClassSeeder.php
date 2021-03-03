<?php

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    public function run()
    {
        SchoolClass::insert([
            ['description' => 'Turma 1'],
            ['description' => 'Turma 2'],
            ['description' => 'Turma 3'],
            ['description' => 'Turma 4'],
            ['description' => 'Turma 5'],
        ]);
    }
}
