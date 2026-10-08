<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'front_material' => $this->faker->randomElement([
    'white',
    'oak',
    'walnut',
]),
'handle_style' => $this->faker->randomElement([
    'black_bar',
    'brass_knob',
    'handleless',
]),
'worktop' => $this->faker->randomElement([
    'light_stone',
    'dark_stone',
    'wood',
]),
        ];
    }
}
