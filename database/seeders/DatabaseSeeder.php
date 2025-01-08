<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $positions = ['Lawyer', 'Content manager', 'Security', 'Designer'];

        foreach ($positions as $position) {
            Position::factory()->create(['name' => $position]);
        }
        
        User::factory(45)->create();
    }
}
