<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function Laravel\Prompts\text;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()
            ->count(10)
            ->create();
//BEDROOM***************************************************************************************************************
            DB::table('bedroom')->insert([
                'id' => Str::uuid(),
                'number' => Str('11'),
            ]);

//BEDROOM TYPE**********************************************************************************************************

        DB::table('bedroom_type')->insert([
            'id' => Str::uuid(),
            'name' => Str('Suite Royale'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam faucibus vitae odio et molestie.
            Nunc molestie scelerisque massa et semper. Proin at eleifend erat,
            ac mattis sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
        ]);

        DB::table('bedroom_type')->insert([
            'id' => Str::uuid(),
            'name' => Str('Suite Artichaut'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
             Proin at eleifend erat, ac mattis sem.
             Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),

        ]);
        DB::table('bedroom_type')->insert([
        'id' => Str::uuid(),
        'name' => Str('Suite X'),
        'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
        Proin at eleifend erat, ac mattis sem.
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
        'price' => number_format(254),

        ]);
        DB::table('bedroom_type')->insert([
            'id' => Str::uuid(),
            'name' => Str('Classic Rooms'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
            Proin at eleifend erat, ac mattis sem.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
        ]);

        //FOOTER********************************************************************************************************
            DB::table('footer')->insert([
                'id' => Str::uuid(),
                'title' => Str('Hôtel Artichaut'),
                'text' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
                'titleReseau' => Str('Reseau'),
                'iconReseau' => Str('/data/images/footer.png'),
                'linkReseau' => Str('https://github.com/tristan/tristan'),
            ]);
            //HEADER****************************************************************************************************
            DB::table('header')->insert([
                'id' => Str::uuid(),
                'backgroundColor' => Str('0D5649/158470'),
                'logo' => Str('data/images/logo.png'),
                'icone' => Str('data/images/icone.png'),
            ]);
            //HERO******************************************************************************************************
            DB::table('hero')->insert([
                'id' => Str::uuid(),
                'title' => Str('Welcome to Hostel Artichaut'),
                'description' => Str('
                The Hotel Artichaut is a luxury hotel, founded in 1426,
                located not far from the highest and most beautiful mountains of Haute-Savoie,
                situated between lakes and mountains,
                the Hotel offers an exceptional living environment and a wide range of life-size activities.'),
                ]);
            //HOTEL*****************************************************************************************************
            DB::table('hotel')->insert([
                'id' => Str::uuid(),
                'name' => Str('Hotel Artichaut'),
                'address' => Str('24 route du Lac'),
                'phone' => Str('0102030405'),
                'email' => Str('hotel@tristan.com'),
                'postalCode' => Str('74000'),
            ]);
            //NEWS******************************************************************************************************

                DB::table('news')->insert([
                    'id' => Str::uuid(),
                    'title' => Str('Hostel'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
                ]);

                DB::table('news')->insert([
                    'id' => Str::uuid(),
                    'title' => Str('Restaurant'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
                ]);

                DB::table('news')->insert([
                    'id' => Str::uuid(),
                    'title' => Str('Spa'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
                ]);
                //RESERVATION*******************************************************************************************

            for ($i = 0; $i < 9; $i++) {
                $user = User::all()->random();
                DB::table('reservation')->insert([
                    'id' => Str::uuid(),
                    'startDate' => date('2020-01-01'),
                    'endDate' => date('2020-01-02'),
                    'user_id' => $user->id,
                ]);
            }

                //SERVICE***********************************************************************************************


                DB::table('services')->insert([
                    'id' => Str::uuid(),
                    'name' => Str('Pressing'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
                    'duration' => number_format(2),
                    'price' => number_format(25),
                    'time' => number_format(3),
                    'quantity' => number_format(2),
                ]);

                DB::table('services')->insert([
                    'id' => Str::uuid(),
                    'name' => Str('Pressing'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
                    'duration' => number_format(2),
                    'price' => number_format(25),
                    'time' => number_format(3),
                    'quantity' => number_format(2),
                ]);

                DB::table('services')->insert([
                    'id' => Str::uuid(),
                    'name' => Str('High-Tech Pack'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
                    'duration' => number_format(2),
                    'price' => number_format(25),
                    'time' => number_format(3),
                    'quantity' => number_format(2),
                ]);

                DB::table('services')->insert([
                    'id' => Str::uuid(),
                    'name' => Str('Valet'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
                    'duration' => number_format(2),
                    'price' => number_format(25),
                    'time' => number_format(3),
                    'quantity' => number_format(2),
                ]);

                DB::table('services')->insert([
                    'id' => Str::uuid(),
                    'name' => Str('Concierge'),
                    'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
                    'duration' => number_format(2),
                    'price' => number_format(25),
                    'time' => number_format(3),
                    'quantity' => number_format(2),
                ]);
            //PICTURES**************************************************************************************************

            DB::table('pictures')->insert([
                'id' => Str::uuid(),
                'picturePath' => Str('/data/images/picture.png'),
            ]);

            //STRONGEST*************************************************************************************************

            DB::table('strongest')->insert([
                'id' => Str::uuid(),
                'background_color_1' => Str('#D8D27D'),
                'background_opacity_1' => Str('100'),
                'background_color_2' => Str('#FFFFFF'),
                'background_opacity_2' => Str('50'),
            ]);

            //StRONGEST SECTION*********************************************************************

        DB::table('strongest_section')->insert([
            'id' => Str::uuid(),
            'icon' => Str('i-ph:bowl-food-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
        ]);

        DB::table('strongest_section')->insert([
            'id' => Str::uuid(),
            'icon' => Str('i-ph:house-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
        ]);

        DB::table('strongest_section')->insert([
            'id' => Str::uuid(),
            'icon' => Str('i-ph:door-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
        ]);
    }
}
