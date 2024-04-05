<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('has_permission')->insert([
            ['id' => fake()->unique()->uuid() ,'user_id'=> '9b7eb263-8621-4d88-935a-42db88276441', 'permission_id' => '2c8fd86c-c12f-37f7-a0dc-05143ccfd61d', 'created_at'=>Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
