<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('infos')->insert([
            'user_id' => rand(1, 20),
            'phone' => '+7' . rand(1111111111, 9999999999),
            'address' => 'г. ' . Str::random(8) . ', улица ' . Str::random(11) . ', дом ' . rand(1, 100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
