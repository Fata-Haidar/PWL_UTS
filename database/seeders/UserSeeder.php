<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
    'level_id' => 1,
    'username' => 'admin',
    'nama' => 'Administrator',
    'password' => 'password',
]);
    }
}
