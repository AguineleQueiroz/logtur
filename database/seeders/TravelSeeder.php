<?php

namespace Database\Seeders;

use App\Models\Travel;
use Database\Factories\TravelFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TravelFactory::factoryForModel('Travel')->count(3)->create();
    }
}
