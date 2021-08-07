<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'demo@gmail.com',
            'password' => Hash::make('111111'),
            "email_verified_at" => now(),
            "is_active" => 1,
            "admin" => 1,
            "remember_token" => Str::random(10)
        ]);
    }
}
