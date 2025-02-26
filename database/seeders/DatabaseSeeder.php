<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Bedroom;
use App\Models\BedroomType;
use App\Models\Hero;
use App\Models\News;
use App\Models\Reservation;
use App\Models\Services;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();
        DB::table('users')->insert([
            'firstname' => Str('Tristan'),
            'lastname' => Str('Chadeuf'),
            'email' => Str('tristanChadeuf@gmail.com'),
            'emailBis' => Str('tristanChadeuf2@gmail.com'),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber,
            'phoneBis' => fake()->phoneNumber,
            'role' => fake()->randomNumber(1, 3),
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ]);
        //BEDROOM TYPE**********************************************************************************************************
        DB::table('bedroom_type')->insert([
            'name' => Str('Suite Royale'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam faucibus vitae odio et molestie.
            Nunc molestie scelerisque massa et semper. Proin at eleifend erat,
            ac mattis sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('bedroom_type')->insert([
            'name' => Str('Suite Artichaut'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
             Proin at eleifend erat, ac mattis sem.
             Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('bedroom_type')->insert([
            'name' => Str('Suite X'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
        Proin at eleifend erat, ac mattis sem.
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


        ]);
        DB::table('bedroom_type')->insert([
            'name' => Str('Classic Rooms'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Aliquam faucibus vitae odio et molestie. Nunc molestie scelerisque massa et semper.
            Proin at eleifend erat, ac mattis sem.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;'),
            'price' => number_format(254),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //BEDROOM***************************************************************************************************************
        for ($i = 1; $i < 35; $i++) {
            $bedroomType = BedroomType::all()->random();
            DB::table('bedroom')->insert([
                'number' => Str($i),
                'bedroom_type_id' => $bedroomType->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        //FOOTER********************************************************************************************************
        DB::table('footer')->insert([
            'title' => Str('Hôtel Artichaut'),
            'text' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit'),
            'titleReseau' => Str('Reseau'),
            'iconReseau' => Str('/data/images/footer.png'),
            'linkReseau' => Str('https://github.com/tristan/tristan'),
            'background_color'=>Str('0D5649'),
            'background_opacity'=>Str('072527'),
             'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        //HEADER****************************************************************************************************
        DB::table('header')->insert([
            'backgroundColor' => Str('0D5649/158470'),
            'logo' => Str('data/images/logo.png'),
            'icone' => Str('data/images/icone.png'),
            'background_color_1'=>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'fondus_color_2'=>Str('158470'),
            'fondus_opacity_2'=>Str('072527'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        //HERO******************************************************************************************************
        DB::table('hero')->insert([

            'title' => Str('Welcome to Hostel Artichaut'),
            'description' => Str('
                The Hotel Artichaut is a luxury hotel, founded in 1426,
                located not far from the highest and most beautiful mountains of Haute-Savoie,
                situated between lakes and mountains,
                the Hotel offers an exceptional living environment and a wide range of life-size activities.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        //HOTEL*****************************************************************************************************
        DB::table('hotel')->insert([
            'name' => Str('Hotel Artichaut'),
            'address' => Str('24 route du Lac'),
            'phone' => Str('0102030405'),
            'email' => Str('hotel@tristan.com'),
            'postalCode' => Str('74000'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'background_color'=>Str('EDE798'),
            'background_opacity'=>Str('D9D9D9'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'title' => Str('Restaurant'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
            'background_color'=>Str('EDE798'),
            'background_opacity'=>Str('D9D9D9'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'title' => Str('Spa'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Aliquam faucibus vitae odio et molestie.
                    Nunc molestie scelerisque massa et semper.
                    Proin at eleifend erat, ac mattis sem.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                    Nullam condimentum tincidunt augue, vel convallis sapien imperdiet sit amet.'),
            'background_color'=>Str('EDE798'),
            'background_opacity'=>Str('D9D9D9'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
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
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        //PIVOT RESERVATION SERVICE********************************************************************************
        for ($i = 0; $i < 9; $i++) {
            DB::table('reservation_services')->insert([
                'service_id' => Services::all()->random()->id,
                'reservation_id' => Reservation::all()->random()->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        //STRONGEST*************************************************************************************************

        DB::table('strongest')->insert([

            'background_color_1' => Str('#D8D27D'),
            'background_opacity_1' => Str('100'),
            'background_color_2' => Str('#FFFFFF'),
            'background_opacity_2' => Str('50'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //STRONGEST SECTION*********************************************************************************************

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:bowl-food-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:house-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:door-thin'),
            'text' => Str('Duis pellentesque ante et tellus ultrices,
                vitae sodales massa vehicula.
                Sed mi nisl, mattis non vulputate ut, ultrices malesuada tortor.'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //ABOUT*****************************************************************************************************************
        DB::table('about')->insert([
            'title' => Str('The hotel'),
            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam faucibus vitae odio et molestie.
            Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('about')->insert([
            'title' => Str('Le Chadeuf'),
            'description' => Str('Ponctuel
                                                    Sens du détail
                                                    Déteste la poussière
                                                    Ponctuel
                                                    Serviable
                                                    Ponctuel'),
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('about')->insert([
            'title' => Str('The Sarrazin'),
            'description' => Str('Adore le luxe
                                        N’aime pas quand les choses ne sont pas droites parce que du coup ça nuit à l’accessibilité de l’harmonisation du détail
                                        Serviable'),
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('about')->insert([
            'title' => Str('Mein Raph'),
            'description' => Str('Passionné de seconde guerre mondiale
                                        Sens du détail
                                        A travaillé pour l’une des plus grande marque de voiture (Mercedes)
                                        Toujours disponible pour rendre service'),
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('about')->insert([
            'title' => Str('The Good Bastien'),
            'description' => Str('Humain
                                        Gentil
                                        Adorable
                                        Sympa
                                        Cool'),
            'background_color_1' =>Str('0D5649'),
            'background_opacity_1'=>Str('072527'),
            'backgroundText_color_1'=>Str('726F42'),
            'backgroundText_opacity_1'=>Str('D8D27D'),
            'backgroundText_color_2'=>Str('726F42'),
            'backgroundText_opacity_2'=>Str('D8D27D'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //PICTURE***************************************************************************************************************

        $hero = Hero::all()->random();
        $bedroom = Bedroom::all()->random();
        $bedroomType = BedroomType::all()->random();
        $news = News::all()->random();
        $services = Services::all()->random();
        $about = About::all()->random();
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroom1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroom2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroom3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomArtichaut1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomArtichaut2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomArtichaut3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomRoyal1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomRoyal2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomRoyal3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomX1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomX2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomX3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageConciergerie.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageFibre.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHeroHotel.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHeroRestaurant.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHeroSpa.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHotelPresentation.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageOpenNews1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageOpenNews2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageOpenNews3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagePackTechnologie.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagePageAccueil.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagePressing.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageRestaurant.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageSpa1.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageSpa2.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageSpa3.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagevoiturier.png'),
            'hero_id' => $hero->id,
            'bedroom_id' => $bedroom->id,
            'bedroomtype_id' => $bedroomType->id,
            'news_id' => $news->id,
            'services_id' => $services->id,
            'about_id' => $about->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
