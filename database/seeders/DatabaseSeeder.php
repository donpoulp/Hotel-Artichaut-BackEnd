<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()
            ->count(10)
            ->create();

        for ($i = 0; $i < 4; $i++) {
//            DB::table('users')->insert([
//                'id' => Str::uuid(),
//                'firstName' => Str('Tristan'),
//                'lastName' => Str('Chadeuf'),
//                'email' => Str('tristan.chadeuf@gmail.com'),
//                'emailBis' => Str('tristan.chadeuf@gmail.com'),
//                'password' => Str('password'),
//                'phone' => Str('0102030405'),
//                'phoneBis' => Str('0102030405'),
//                'role' => rand(1, 3),
//            ]);
            DB::table('bedroom')->insert([
                'id' => Str::uuid(),
                'number' => Str('11'),
                'image' => Str('/data/images/bedroom.png'),
            ]);
            DB::table('bedroom_type')->insert([
                'id' => Str::uuid(),
                'name' => Str('Artichaut'),
                'description' => Str('Artichaut Chaud'),
                'price' => number_format(254),
            ]);
            DB::table('footer')->insert([
                'id' => Str::uuid(),
                'title' => Str('Footer'),
                'text' => Str('Footer Text'),
                'titleReseau' => Str('Reseau'),
                'iconReseau' => Str('/data/images/footer.png'),
                'linkReseau' => Str('https://github.com/tristan/tristan'),
            ]);
            DB::table('header')->insert([
                'id' => Str::uuid(),
                'backgroundColor' => Str('white'),
                'logo' => Str('data/images/logo.png'),
                'icone' => Str('data/images/icone.png'),
            ]);
            DB::table('hero')->insert([
                'id' => Str::uuid(),
                'title' => Str('Hero'),
                'description' => Str('Hero description'),
                'image' => Str('/data/images/description.png'),
            ]);
            DB::table('hero_btn')->insert([
                'id' => Str::uuid(),
                'text' => Str('Button Text'),
                'action' => Str('hotelArtichaut/home'),
                'backgroundColor' => Str('white'),
                'textColor' => Str('white'),
            ]);
            DB::table('hotel')->insert([
                'id' => Str::uuid(),
                'name' => Str('Hotel Artichaut'),
                'address' => Str('Hotel adresse'),
                'description' => Str('Hotel description'),
                'phone' => Str('0102030405'),
                'email' => Str('hotel@tristan.com'),
                'postalCode' => Str('74000'),
            ]);
            DB::table('news')->insert([
                'id' => Str::uuid(),
                'title' => Str('News'),
                'description' => Str('News description'),
                'content' => Str('News Content'),
                'image' => Str('/data/images/news.png'),
            ]);
            DB::table('reservation')->insert([
                'id' => Str::uuid(),
                'startDate' => date('2020-01-01'),
                'endDate' => date('2020-01-02'),
            ]);
            DB::table('services')->insert([
                'id' => Str::uuid(),
                'name' => Str('Service'),
                'duration' => number_format(2),
                'price' => number_format(25),
                'time' => number_format(3),
                'quantity' => number_format(2),
            ]);
        }
    }
}
