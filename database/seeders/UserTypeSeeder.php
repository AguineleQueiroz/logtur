<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usertypes')->insert([
           ['id'=> fake()->unique()->uuid(), 'type'=>'ADM', "created_at"=>Carbon::now(), "updated_at" => Carbon::now()],
           ['id'=> fake()->unique()->uuid(), 'type'=>'Gerente', "created_at"=>Carbon::now(), "updated_at" => Carbon::now()],
           ['id'=> fake()->unique()->uuid(), 'type'=>'Passageiro', "created_at"=>Carbon::now(), "updated_at" => Carbon::now()]
        ]);
    }
}
