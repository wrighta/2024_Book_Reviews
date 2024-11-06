<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // In database/seeders/AdminSeeder.php
    public function run() {
        \App\Models\User::first()->update([
            'role' => 'admin',
        ]);
    }

}
