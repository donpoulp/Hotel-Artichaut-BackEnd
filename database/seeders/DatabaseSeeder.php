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
            'is_admin' => 1,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ]);
        //BEDROOM TYPE**************************************************************************************************
        DB::table('bedroom_type')->insert([
            'nameFr' => Str('Suite Royale'),
            'nameEn' => Str('Royal Suite'),
            'descriptionFr' => Str('Culminant au dernier étage de l’hôtel,
            nos Suites Royale allient modernité et douceur de vivre.;'),
            'descriptionEn'=>Str('Culminating on the top floor of the hotel,
            our Royale Suites combine modernity and the sweetness of life.'),
            'price' => number_format(254.00),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('bedroom_type')->insert([
            'nameFr' => Str('Suite Artichaut'),
            'nameEn' => Str('Artichoke Suite'),
            'descriptionFr' => Str('Laissez-vous séduire par le cadre envoûtant des Suites Exécutives,
             au design contemporain, élégant et lumineux avec vue sur la baie de Annecy.'),
            'descriptionEn'=>Str('Let yourself be seduced by the captivating setting of the Executive Suites,
             with their contemporary, elegant and bright design overlooking the bay of Annecy.'),
            'price' => number_format(254.00),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);
        DB::table('bedroom_type')->insert([
            'nameFr' => Str('Suite X'),
            'nameEn' => Str('X Suite'),
            'descriptionFr' => Str("Ces suites luxueuses à l'élégance épurée ont chacune leur identité
             propre grâce à un style très personnel."),
            'descriptionEn'=>Str("These luxurious suites with refined elegance each
            have their own identity thanks to a very personal style."),
            'price' => number_format(254.00),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


        ]);
        DB::table('bedroom_type')->insert([
            'nameFr' => Str('Chambre Classique'),
            'nameEn' => Str('Classic Bedroom'),
            'descriptionFr' => Str("Ces chambres à l’élégance moderne disposent
             d’une salle de bains avec douche ou baignoire. "),
            'descriptionEn'=> Str("These modernly elegant rooms have a bathroom
             with a shower or bathtub."),
            'price' => number_format(254.00),
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
            'titleFr' => Str('Hôtel Artichaut'),
            'titleEn' => Str('Hostel Artichoke'),
            'textFr' => Str('En esperant bientot vous rencontrez'),
            'textEn' => Str('Hoping to meet you soon'),
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
            'titleFr'=>Str("Bienvenue à l'Hotel Artichaut"),
            'titleEn' => Str('Welcome to Hostel Artichoke'),
            'descriptionFr' => Str("
               Implanté au coeur d'un site exceptionnel dans l'environnement idyllique de la ville d’Annecy,
                l’Impérial Palace, hôtel 4 étoiles, offre une vue imprenable sur le lac d’Annecy. "),
            'descriptionEn'=>Str("
              Located in the heart of an exceptional site in the idyllic environment of the city of Annecy,
              the Impérial Palace, a 4-star hotel, offers a breathtaking view of Lake Annecy."),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        //HOTEL*****************************************************************************************************
        DB::table('hotel')->insert([
            'nameFr' => Str('Hotel Artichaut'),
            'nameEn' => Str('Hostel Artichoke'),
            'address' => Str('24 route du Lac'),
            'phone' => Str('0102030405'),
            'email' => Str('hotel@tristan.com'),
            'postalCode' => Str('74000'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        //NEWS******************************************************************************************************

        DB::table('news')->insert([
            'titleFr' => Str('Hotel'),
            'titleEn'=>Str('Hostel'),
            'descriptionFr' => Str('Au cours de votre séjour, vous aurez l’opportunité de déguster une cuisine raffinée,
             créative et de grande qualité dans l’un de nos restaurants donnant sur le lac d’Annecy'),
            'descriptionEn'=>Str("During your stay, you will have the opportunity to taste refined,
             creative and high quality cuisine in one of our restaurants overlooking Lake Annecy."),
            'background_color'=>Str('EDE798'),
            'background_opacity'=>Str('D9D9D9'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'titleFr' => Str('Restaurant'),
            'titleEn'=>  Str('Restaurant'),
            'descriptionFr' => Str('Au cours de votre séjour, vous aurez l’opportunité de déguster une cuisine raffinée,
             créative et de grande qualité dans l’un de nos restaurants donnant sur le lac d’Annecy'),
            'descriptionEn'=>Str("During your stay, you will have the opportunity to taste refined,
             creative and high quality cuisine in one of our restaurants overlooking Lake Annecy."),
            'background_color'=>Str('EDE798'),
            'background_opacity'=>Str('D9D9D9'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('news')->insert([
            'titleFr' => Str('Spa'),
            'titleEn'=>Str('Spa'),
            'descriptionFr' => Str('Au cours de votre séjour, vous aurez l’opportunité de déguster une cuisine raffinée,
             créative et de grande qualité dans l’un de nos restaurants donnant sur le lac d’Annecy'),
            'descriptionEn'=>Str("During your stay, you will have the opportunity to taste refined,
             creative and high quality cuisine in one of our restaurants overlooking Lake Annecy."),
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
            'nameFr' => Str('Pressing'),
            'nameEn' => Str('Dry Cleaning'),
            'descriptionFr' => Str('Le Cristal Service dispense des rituels de beauté issus de traditions
             ancestrales et imaginés par Phytomer et Alpeor dans une atmosphère
              intimiste et apaisante : une véritable invitation au voyage sensoriel vous attend...'),
            'descriptionEn'=>Str("The Cristal Service provides beauty rituals from ancestral
             traditions and imagined by Phytomer and Alpeor in an intimate and soothing atmosphere:
             a true invitation to a sensory journey awaits you..."),
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
            'nameFr' => Str('Pack Fibre'),
            'nameEn' => Str('High pack Fiber'),
            'descriptionFr' => Str('Le Cristal Service dispense des rituels de beauté issus de traditions
             ancestrales et imaginés par Phytomer et Alpeor dans une atmosphère
              intimiste et apaisante : une véritable invitation au voyage sensoriel vous attend...'),
            'descriptionEn'=>Str("The Cristal Service provides beauty rituals from ancestral
             traditions and imagined by Phytomer and Alpeor in an intimate and soothing atmosphere:
             a true invitation to a sensory journey awaits you..."),
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
            'nameFr' => Str('Pack Tech'),
            'nameEn' => Str('High-Tech Pack'),
            'descriptionFr' => Str('Le Cristal Service dispense des rituels de beauté issus de traditions
             ancestrales et imaginés par Phytomer et Alpeor dans une atmosphère
              intimiste et apaisante : une véritable invitation au voyage sensoriel vous attend...'),
            'descriptionEn'=>Str("The Cristal Service provides beauty rituals from ancestral
             traditions and imagined by Phytomer and Alpeor in an intimate and soothing atmosphere:
             a true invitation to a sensory journey awaits you..."),
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
            'nameFr' => Str('Valet'),
            'nameEn' => Str('Valet'),
            'descriptionFr' => Str('Le Cristal Service dispense des rituels de beauté issus de traditions
             ancestrales et imaginés par Phytomer et Alpeor dans une atmosphère
              intimiste et apaisante : une véritable invitation au voyage sensoriel vous attend...'),
            'descriptionEn'=>Str("The Cristal Service provides beauty rituals from ancestral
             traditions and imagined by Phytomer and Alpeor in an intimate and soothing atmosphere:
             a true invitation to a sensory journey awaits you..."),
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
            'nameFr' => Str('Concierge'),
            'nameEn' => Str('Concierge'),
            'descriptionFr' => Str('Le Cristal Service dispense des rituels de beauté issus de traditions
             ancestrales et imaginés par Phytomer et Alpeor dans une atmosphère
              intimiste et apaisante : une véritable invitation au voyage sensoriel vous attend...'),
            'descriptionEn'=>Str("The Cristal Service provides beauty rituals from ancestral
             traditions and imagined by Phytomer and Alpeor in an intimate and soothing atmosphere:
             a true invitation to a sensory journey awaits you..."),
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
            'textFr' => Str("Tout au long de l'année,
             notre établissement 4 étoiles vous garantit un séjour grand luxe"),
            'textEn' => Str('All year round, our 4-star establishment guarantees you a luxurious stay'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:house-thin'),
            'textFr' => Str("Tout au long de l'année,
             notre établissement 4 étoiles vous garantit un séjour grand luxe"),
            'textEn' => Str('All year round, our 4-star establishment guarantees you a luxurious stay'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('strongest_section')->insert([
            'icon' => Str('i-ph:door-thin'),
            'textFr' => Str("Tout au long de l'année,
             notre établissement 4 étoiles vous garantit un séjour grand luxe"),
            'textEn' => Str('All year round, our 4-star establishment guarantees you a luxurious stay'),
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
