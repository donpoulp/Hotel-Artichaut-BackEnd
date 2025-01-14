<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'firstName' => Str::random(10),
            'lastName' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'emailBis' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'phone' => Str('0102030405'),
            'phoneBis' => Str('0102030405'),
            'role' => Str::random(10),
        ]);
    }
}
