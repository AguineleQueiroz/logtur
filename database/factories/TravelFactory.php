<?php

namespace Database\Factories;

use App\Models\Travel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    protected $model = Travel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '9b4faf9e-4976-4a94-8091-816fe3a6dc6e',
            'name' => \Faker\Factory::create('pt_BR')->city(),
            'departure' => \Faker\Factory::create('pt_BR')->date('Y-m-d H:i:s'),
            'arrival' => \Faker\Factory::create('pt_BR')->date('Y-m-d H:i:s'),
            'description' => \Faker\Factory::create('pt_BR')->text(100),
            'payment_method1' => 'Pix: R$50 + 10 x de R$150 de Jan a Out',
            'payment_method2' => 'Crédito: 12 x de R$150',
        ];
    }
}
