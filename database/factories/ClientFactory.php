<?php

namespace Database\Factories;

use App\Models\Client;
use App\Util\GeneralHelper;
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
            'user_id' => '9bc50e25-c124-4e92-a26c-974debff342d',
            'name' => fake()->name(),
            'identity' => \Faker\Factory::create('pt_BR')->unique()->numberBetween(10000000, 99999999),
            'email' => \Faker\Factory::create('pt_BR')->email(),
            'age' => \Faker\Factory::create('pt_BR')->date('Y-m-d'),
            'address' => \Faker\Factory::create('pt_BR')->address(),
            'city' => \Faker\Factory::create('pt_BR')->city(),
            'phone' => \Faker\Factory::create('pt_BR')->phoneNumber(),
        ];
    }
}
