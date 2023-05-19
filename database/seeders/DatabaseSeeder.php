<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'krido pambudi',
            'email' => 'krido@gow.com',
            'password' => bcrypt('krido'),
        ]);

        \App\Models\Product::factory(10)->create();
    }
}
