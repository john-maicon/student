<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::insert(
            [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('admin123'),
            ]);
    }
}
