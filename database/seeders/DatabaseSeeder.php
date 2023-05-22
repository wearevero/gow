<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'krido pambudi',
            'email' => 'krido@gow.com',
            'password' => bcrypt('krido'),
        ]);

        Role::query()->create([
            'name' => 'super admin'
        ]);

        User::find(1)->assignRole('super admin');

        \App\Models\Product::factory(10)->create();
    }
}
