<?php

namespace Database\Seeders;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $admin = User::factory()->create([
    'name' => 'Admin User',
    'email' => 'admin@admin.com',
    'password' => 'password',
]);

Project::factory()
    ->count(5)
    ->for($admin)
    ->create();
}
}
