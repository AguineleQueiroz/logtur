<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UserType;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('has_permission')->insert([
            ['id' => fake()->unique()->uuid() ,'user_id'=> '9c81b2a2-c991-4618-be55-8e953d7862ad', 'permission_id' => '5ceca36e-d92f-3169-b9c1-78f542b2866a', 'created_at'=>Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
