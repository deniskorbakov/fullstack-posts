<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jenssegers\Agent\Agent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoginInfo>
 */
class LoginInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 5),
            'ip' => fake()->ipv4,
            'platform' => Agent::getPlatforms()[array_rand(Agent::getPlatforms())],
            'device' => Agent::getDesktopDevices()[array_rand(Agent::getDesktopDevices())],
            'browser' => Agent::getBrowsers()[array_rand(Agent::getBrowsers())],
            'country' => fake()->country,
            'city_name' => fake()->city,
            'robot' => false,
        ];
    }
}
