<?php

namespace Database\Seeders;

use App\Models\Bedroom;
use App\Models\Picture;
use App\Models\Services;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::factory()
            ->count(10)
            ->create();
//BEDROOM***************************************************************************************************************
        DB::table('bedroom')->insert([
            'number' => Str('11'),
        ]);

//PICTURE***************************************************************************************************************

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroom1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroom2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroom3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomArtichaut1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomArtichaut2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomArtichaut3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomRoyal1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomRoyal2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomRoyal3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomX1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomX2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageBedroomX3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageConciergerie.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageFibre.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageHeroHotel.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageHeroRestaurant.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageHeroSpa.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageHotelPresentation.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageNews1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageNews2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageNews3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageOpenNews1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageOpenNews2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageOpenNews3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageNews1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imagePackTechnologie.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imagePageAccueil.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imagePressing.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageRestaurant.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageSpa1.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageSpa2.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imageSpa3.png'),
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000//storage/imagevoiturier.png'),
        ]);


        //BEDROOM TYPE**********************************************************************************************************

        DB::table('bedroom_type')->insert([
            'name' => Str('Suite Royale'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam faucibus vitae odio et molestie.
            Nunc molestie scelerisque massa et semper. Proin at eleifend erat,
            ac mattis sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'picture_id' => Picture::all()->random()->id,
        ]);

        DB::table('bedroom_type')->insert([
            'name' => Str('Suite Artichaut'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
             Proin at eleifend erat, ac mattis sem.
             Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'picture_id' => Picture::all()->random()->id,

        ]);
        DB::table('bedroom_type')->insert([
            'name' => Str('Suite X'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
        Proin at eleifend erat, ac mattis sem.
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'picture_id' => Picture::all()->random()->id,

        ]);
        DB::table('bedroom_type')->insert([
            'name' => Str('Classic Rooms'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
            Proin at eleifend erat, ac mattis sem.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'picture_id' => Picture::all()->random()->id,
        ]);

        //FOOTER********************************************************************************************************
        DB::table('footer')->insert([
            'title' => Str('Hôtel Artichaut'),
            'text' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
            'titleReseau' => Str('Reseau'),
            'iconReseau' => Str('/data/images/footer.png'),
            'linkReseau' => Str('https://github.com/tristan/tristan'),
        ]);
        //HEADER****************************************************************************************************
        DB::table('header')->insert([
            'backgroundColor' => Str('0D5649/158470'),
            'logo' => Str('data/images/logo.png'),
            'icone' => Str('data/images/icone.png'),
        ]);
        //HERO******************************************************************************************************
        DB::table('hero')->insert([

            'title' => Str('Welcome to Hostel Artichaut'),
            'description' => Str('
                The Hotel Artichaut is a luxury hotel, founded in 1426,
                located not far from the highest and most beautiful mountains of Haute-Savoie,
                situated between lakes and mountains,
                the Hotel offers an exceptional living environment and a wide range of life-size activities.'),
            'picture_id' => Picture::all()->random()->id,
        ]);
        //HOTEL*****************************************************************************************************
        DB::table('hotel')->insert([
            'name' => Str('Hotel Artichaut'),
            'address' => Str('24 route du Lac'),
            'phone' => Str('0102030405'),
            'email' => Str('hotel@tristan.com'),
            'postalCode' => Str('74000'),
        ]);
        //NEWS******************************************************************************************************

        DB::table('news')->insert([
            'title' => Str('Hostel'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
            'picture_id' => Picture::all()->random()->id,
        ]);

        DB::table('news')->insert([
            'title' => Str('Restaurant'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
            'picture_id' => Picture::all()->random()->id,
        ]);

        DB::table('news')->insert([
            'title' => Str('Spa'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
            'picture_id' => Picture::all()->random()->id,
        ]);

        //STATUS***********************************************************************************************

        DB::table('statuses')->insert([
            'state' => Str('cancelled'),
        ]);
        DB::table('statuses')->insert([
            'state' => Str('paid'),
        ]);
        DB::table('statuses')->insert([
            'state' => Str('pending'),
        ]);

        //SERVICE***********************************************************************************************


        DB::table('services')->insert([
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

        //RESERVATION*******************************************************************************************

        for ($i = 0; $i < 9; $i++) {
            $user = User::all()->random();
            DB::table('reservation')->insert([
                'startDate' => date('2020-01-01'),
                'endDate' => date('2020-01-02'),
                'user_id' => $user->id,
                'bedroom_id' => Bedroom::all()->random()->id,
                'status_id' => Status::all()->random()->id,
                'service_id' => Services::all()->random()->id,
            ]);
        }

        //STRONGEST*************************************************************************************************

        DB::table('strongest')->insert([

            'background_color_1' => Str('#D8D27D'),
            'background_opacity_1' => Str('100'),
            'background_color_2' => Str('#FFFFFF'),
            'background_opacity_2' => Str('50'),
        ]);

        //STRONGEST SECTION*********************************************************************

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:bowl-food-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
        ]);

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:house-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
        ]);

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:door-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
        ]);
    }


}
