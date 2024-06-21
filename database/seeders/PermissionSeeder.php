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
            ['id' => fake()->unique()->uuid() ,'user_id'=> '9bc50e25-c124-4e92-a26c-974debff342d', 'permission_id' => '5ceca36e-d92f-3169-b9c1-78f542b2866a', 'created_at'=>Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
