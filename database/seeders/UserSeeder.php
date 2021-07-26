<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'admin',
                'email' => 'admin@admin',
                'password' => '$2y$10$875TzKjfPaT4xkl/TAZYXe8qaQeeyJ9ZyQbShJ5TWJguFxA71T8Au',
            ],
            [
                'id' => '2',
                'name' => 'kiosk',
                'email' => 'kiosk@kiosk',
                'password' => '$2y$10$qBDXLtZr5/QqonC5kW4vYe8kI5eGuBJz8ZOVMvahIQg4cdyXjidRG',
            ],
        ]);
    }
}
