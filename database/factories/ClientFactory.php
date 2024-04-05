<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '9b7eb74a-81ec-4220-b482-95b1be7d7192',
            'name' => fake()->name(),
            'identity' => \Faker\Factory::create('pt_BR')->unique()->numberBetween(10000000, 99999999),
            'age' => \Faker\Factory::create('pt_BR')->numberBetween(07, 100),
            'address' => \Faker\Factory::create('pt_BR')->address(),
            'city' => \Faker\Factory::create('pt_BR')->city(),
            'phone' => \Faker\Factory::create('pt_BR')->phoneNumber(),
        ];
    }
}
