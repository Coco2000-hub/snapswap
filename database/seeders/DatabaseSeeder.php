<?php

namespace Database\Seeders;
use App\Models\Project;
use App\Models\User;
use App\Models\Comment;
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
       $customer = User::factory()->create([
    'name' => 'Customer User',
    'email' => 'admin@admin.com',
    'password' => 'password',
]);
$advisor = User::factory()->create([
    'name' => 'Advisor User',
    'email' => 'advisor@example.com',
    'password' => 'password',
    'role' => 'advisor',
]);
$projects = Project::factory()
    ->count(5)
    ->for($customer)
    ->create();


foreach ($projects as $project) {
        Comment::factory()
            ->count(2)
            ->for($project)
            ->for($advisor)
            ->create();
    }
}
}
