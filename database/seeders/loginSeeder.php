<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class loginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com'
            'password'=>'123' Hash::make('admin')
        ]);
    }
}
