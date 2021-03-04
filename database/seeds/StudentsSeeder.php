<?php

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::insert([
                [
                    'name' => 'Gabriela',
                    'email' => 'gabriela@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'João',
                    'email' => 'joao@email.com',
                    'school_classes_id' => 3
                ],
                [
                    'name' => 'maria',
                    'email' => 'maria@email.com',
                    'school_classes_id' => 4
                ],
                [
                    'name' => 'Ana',
                    'email' => 'ana@email.com',
                    'school_classes_id' => 5
                ],
                [
                    'name' => 'Marcos',
                    'email' => 'marcos@email.com',
                    'school_classes_id' => 3
                ],
                [
                    'name' => 'Leonardo',
                    'email' => 'leo@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'John',
                    'email' => 'john@email.com',
                    'school_classes_id' => 4
                ],
                [
                    'name' => 'Joaquina',
                    'email' => 'joaquina@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'Cida',
                    'email' => 'c@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'Nathalia',
                    'email' => 'nati@email.com',
                    'school_classes_id' => 3
                ],
                [
                    'name' => 'izabela',
                    'email' => 'iza@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'Edenilson',
                    'email' => 'edenilson@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'Marcondes',
                    'email' => 'marco_@email.com',
                    'school_classes_id' => 5
                ],
                [
                    'name' => 'José',
                    'email' => 'jose@email.com',
                    'school_classes_id' => 2
                ],
                [
                    'name' => 'Joana',
                    'email' => 'joana@email.com',
                    'school_classes_id' => 1
                ],
                [
                    'name' => 'Marcelo',
                    'email' => 'marcelo@email.com',
                    'school_classes_id' => 5
                ],

            ]);
    }
}
