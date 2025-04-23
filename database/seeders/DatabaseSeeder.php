<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutDescription;
use App\Models\AboutSection;
use App\Models\BedroomType;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Hero;
use App\Models\Icon;
use App\Models\News;
use App\Models\Reservation;
use App\Models\Services;
use App\Models\Status;
use App\Models\Strongest;
use App\Models\Teams;
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
            'email' => Str('tristan.chadeuf@gmail.com'),
            'emailBis' => Str('tristanChadeuf2@gmail.com'),
            'password' => Hash::make('password'),
            'phone' => fake()->phoneNumber,
            'phoneBis' => fake()->phoneNumber,
            'is_admin' => 1,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ]);
        DB::table('users')->insert([
            'firstname' => Str('Bast'),
            'lastname' => Str('b'),
            'email' => Str('bastien.pelletier74@gmail.com'),
            'emailBis' => Str('rien@gmail.com'),
            'password' => Hash::make('bast123456'),
            'phone' => fake()->phoneNumber,
            'phoneBis' => fake()->phoneNumber,
            'is_admin' => 1,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ]);
        DB::table('users')->insert([
            'firstname' => Str('Raphael'),
            'lastname' => Str('Petrozzi'),
            'email' => Str('raphael.petrozzi@gmail.com'),
            'emailBis' => Str(''),
            'password' => Hash::make('123456789'),
            'phone' => fake()->phoneNumber,
            'phoneBis' => fake()->phoneNumber,
            'is_admin' => 1,
            'created_at' => fake()->dateTime,
            'updated_at' => fake()->dateTime,
        ]);
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now();

        for ($i = 0; $i < 20; $i++) {
            $createdAt = fake()->dateTimeBetween($start, $end);

            DB::table('users')->insert([
                'firstname' => fake()->firstName,
                'lastname' => fake()->lastName,
                'email' => fake()->unique()->safeEmail,
                'emailBis' => fake()->unique()->safeEmail,
                'password' => Hash::make('password'),
                'phone' => fake()->phoneNumber,
                'phoneBis' => fake()->phoneNumber,
                'is_admin' => 0,
                'created_at' => $createdAt,
                'updated_at' => $createdAt,
            ]);
        }
        //BEDROOM TYPE**************************************************************************************************
        DB::table('bedroom_type')->insert([
            'nameFr' => Str('Suite Royale'),
            'nameEn' => Str('Royal Suite'),
            'descriptionFr' => Str('Culminant au dernier étage de l’hôtel,
            nos Suites Royale allient modernité et douceur de vivre.;'),
            'descriptionEn'=>Str('Culminating on the top floor of the hotel,
            our Royale Suites combine modernity and the sweetness of life.'),
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
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
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
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
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
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
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
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
            'background_color'=>Str('#0D5649'),
            'background_opacity'=>Str('100'),
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
            'descriptionFr' => Str("Implanté au coeur d'un site exceptionnel dans l'environnement idyllique de la ville d’Annecy, l’Impérial Palace, hôtel 4 étoiles, offre une vue imprenable sur le lac d’Annecy. "),
            'descriptionEn'=>Str("Located in the heart of an exceptional site in the idyllic environment of the city of Annecy, the Impérial Palace, a 4-star hotel, offers a breathtaking view of Lake Annecy."),
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
            'background_color'=>Str('#EDE798'),
            'background_opacity'=>Str('100'),
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
            'background_color'=>Str('#EDE798'),
            'background_opacity'=>Str('100'),
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
            'background_color'=>Str('#EDE798'),
            'background_opacity'=>Str('100'),
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
            'backgroundText_color_1' => Str('#D8D27D'),
            'backgroundText_opacity_1' => Str('30'),
            'backgroundText_color_2' => Str('#726F42'),
            'backgroundText_opacity_2' => Str('100'),
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
            'backgroundText_color_1' => Str('#D8D27D'),
            'backgroundText_opacity_1' => Str('30'),
            'backgroundText_color_2' => Str('#726F42'),
            'backgroundText_opacity_2' => Str('100'),
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
            'backgroundText_color_1' => Str('#D8D27D'),
            'backgroundText_opacity_1' => Str('30'),
            'backgroundText_color_2' => Str('#726F42'),
            'backgroundText_opacity_2' => Str('100'),
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
            'backgroundText_color_1' => Str('#D8D27D'),
            'backgroundText_opacity_1' => Str('30'),
            'backgroundText_color_2' => Str('#726F42'),
            'backgroundText_opacity_2' => Str('100'),
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
            'backgroundText_color_1' => Str('#D8D27D'),
            'backgroundText_opacity_1' => Str('30'),
            'backgroundText_color_2' => Str('#726F42'),
            'backgroundText_opacity_2' => Str('100'),
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
                'bedroom_type_id' => BedroomType::all()->random()->id,
                'status_id' => Status::all()->random()->id,
                'price' => number_format(25),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now();
        for ($i = 0; $i < 15; $i++) {
            $user = User::all()->random();
            $randomStartDate = Carbon::createFromTimestamp(mt_rand($startOfMonth->timestamp, $endOfMonth->timestamp));
            $randomEndDate = $randomStartDate->copy()->addDay();

            DB::table('reservation')->insert([
                'startDate' => $randomStartDate->format('Y-m-d'),
                'endDate' => $randomEndDate->format('Y-m-d'),
                'user_id' => $user->id,
                'bedroom_type_id' => BedroomType::all()->random()->id,
                'status_id' => Status::all()->random()->id,
                'price' => number_format(25),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        };

        //PIVOT RESERVATION SERVICE********************************************************************************
        for ($i = 0; $i < 9; $i++) {
            DB::table('reservation_services')->insert([
                'service_id' => Services::all()->random()->id,
                'reservation_id' => Reservation::findOrfail(1)->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
        DB::table('reservation_services')->insert([
            'service_id' => Services::all()->random()->id,
            'reservation_id' => Reservation::findOrfail(10)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

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
//        DB::table('about')->insert([
//            'title' => Str('The hotel'),
//            'description' => Str('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam faucibus vitae odio et molestie.
//            Nunc molestie scelerisque massa et semper. Proin at eleifend erat, ac mattis sem.
//            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae'),
//            'background_color_1' => Str('0D5649'),
//            'background_opacity_1' => Str('072527'),
//            'backgroundText_color_1' => Str('726F42'),
//            'backgroundText_opacity_1' => Str('D8D27D'),
//            'backgroundText_color_2' => Str('726F42'),
//            'backgroundText_opacity_2' => Str('D8D27D'),
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//        DB::table('about')->insert([
//            'title' => Str('Le Chadeuf'),
//            'description' => Str('Ponctuel
//                                                    Sens du détail
//                                                    Déteste la poussière
//                                                    Ponctuel
//                                                    Serviable
//                                                    Ponctuel'),
//            'background_color_1' => Str('0D5649'),
//            'background_opacity_1' => Str('072527'),
//            'backgroundText_color_1' => Str('726F42'),
//            'backgroundText_opacity_1' => Str('D8D27D'),
//            'backgroundText_color_2' => Str('726F42'),
//            'backgroundText_opacity_2' => Str('D8D27D'),
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//        DB::table('about')->insert([
//            'title' => Str('The Sarrazin'),
//            'description' => Str('Adore le luxe
//                                        N’aime pas quand les choses ne sont pas droites parce que du coup ça nuit à l’accessibilité de l’harmonisation du détail
//                                        Serviable'),
//            'background_color_1' => Str('0D5649'),
//            'background_opacity_1' => Str('072527'),
//            'backgroundText_color_1' => Str('726F42'),
//            'backgroundText_opacity_1' => Str('D8D27D'),
//            'backgroundText_color_2' => Str('726F42'),
//            'backgroundText_opacity_2' => Str('D8D27D'),
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//        DB::table('about')->insert([
//            'title' => Str('Mein Raph'),
//            'description' => Str('Passionné de seconde guerre mondiale
//                                        Sens du détail
//                                        A travaillé pour l’une des plus grande marque de voiture (Mercedes)
//                                        Toujours disponible pour rendre service'),
//            'background_color_1' => Str('0D5649'),
//            'background_opacity_1' => Str('072527'),
//            'backgroundText_color_1' => Str('726F42'),
//            'backgroundText_opacity_1' => Str('D8D27D'),
//            'backgroundText_color_2' => Str('726F42'),
//            'backgroundText_opacity_2' => Str('D8D27D'),
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);
//
//        DB::table('about')->insert([
//            'title' => Str('The Good Bastien'),
//            'description' => Str('Humain
//                                        Gentil
//                                        Adorable
//                                        Sympa
//                                        Cool'),
//            'background_color_1' => Str('0D5649'),
//            'background_opacity_1' => Str('072527'),
//            'backgroundText_color_1' => Str('726F42'),
//            'backgroundText_opacity_1' => Str('D8D27D'),
//            'backgroundText_color_2' => Str('726F42'),
//            'backgroundText_opacity_2' => Str('D8D27D'),
//            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
//            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
//        ]);

        /// ABOUT ////////////////////////////////////////////////////////////////
        DB::table('about')->insert([
            'background_color' => Str('#D8D27D'),
            'background_opacity' => Str('100'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /// ABOUT_SECTON ////////////////////////////////////////////////////////////////
        DB::table('about_section')->insert([
            'about_id' => About::findOrFail(1)->id,
            'titleEn' => Str('Hostel'),
            'titleFr' => Str('Hotel'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('about_section')->insert([
            'about_id' => About::findOrFail(1)->id,
            'titleEn' => Str('Restaurant'),
            'titleFr' => Str('Restaurant'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('about_section')->insert([
            'about_id' => About::findOrFail(1)->id,
            'titleEn' => Str('SPA'),
            'titleFr' => Str('SPA'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /// ABOUT_DESCRIPTION ////////////////////////////////////////////////////////////////
        DB::table('about_description')->insert([
            'about_section_id' => AboutSection::findOrFail(1)->id,
            'titleEn' => Str('History of Artichaut'),
            'titleFr' => Str("Histoire de l'Artichaut"),
            'descriptionEn' => Str('The Artichaut Hotel is a luxury hotel, founded in 1426 located not far from the highest and most beautiful mountains of Haute-Savoie, located between lakes and mountains, the Hotel offers an exceptional living environment and a wide range of life-size activities.The Artichaut Hotel is a luxury hotel, founded in 1426 located not far from the highest and most beautiful mountains of Haute-Savoie, located between lakes and mountains, the Hotel offers an exceptional living environment and a wide range of life-size activities.'),
            'descriptionFr' => Str("L'Hôtel Artichaut est un hôtel de luxe, fondé en 1426 situé non loin des plus hautes et plus belles montagnes de Haute-Savoie, situé entre lacs et montagnes, l'Hôtel offre un cadre de vie exceptionnel et un large choix d'activités grandeur nature. L'Hôtel Artichaut est un hôtel de luxe, fondé en 1426 situé non loin des plus hautes et plus belles montagnes de Haute-Savoie, situé entre lacs et montagnes, l'Hôtel offre un cadre de vie exceptionnel et un large choix d'activités grandeur nature."),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('about_description')->insert([
            'about_section_id' => AboutSection::findOrFail(1)->id,
            'titleEn' => Str('Our Team'),
            'titleFr' => Str('Notre équipe'),
            'background_color' => Str('#072527'),
            'background_opacity' => Str('100'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('about_description')->insert([
            'about_section_id' => AboutSection::findOrFail(2)->id,
            'titleEn' => Str('Restaurant & Bar'),
            'titleFr' => Str('Restaurant-Bar'),
            'descriptionEn' => Str("The Hôtel Artichaut, an essential stopover for gastronomy, offers you its exceptional restaurant: L'Artic Show, which has been awarded a star in the Michelin Guide."),
            'descriptionFr' => Str("L'Hôtel Artichaut, étape incontournable de la gastronomie, vous propose son restaurant d'exception : L'Artic Show, récompensé d'une étoile au Guide Michelin."),
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('about_description')->insert([
            'about_section_id' => AboutSection::findOrFail(2)->id,
            'titleEn' => Str("L'Artic Show"),
            'titleFr' => Str("L'Artic Show"),
            'descriptionEn' => Str("The Hôtel Artichaut, an essential stopover for gastronomy, offers you its exceptional restaurant: L'Artic Show, which has been awarded a star in the Michelin Guide."),
            'descriptionFr' => Str("L'Hôtel Artichaut, étape incontournable de la gastronomie, vous propose son restaurant d'exception : L'Artic Show, récompensé d'une étoile au Guide Michelin."),
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('about_description')->insert([
            'about_section_id' => AboutSection::findOrFail(3)->id,
            'titleEn' => Str('SPA & Well-being'),
            'titleFr' => Str('SPA & Bien-être'),
            'descriptionEn' => Str("Nestled at the foot of the mountains, our 1,200 m² spa is a unique haven in the region. During your stay, you'll enjoy access to seven treatment rooms, indoor and outdoor pools, a hammam, sauna, hot tubs, a yoga studio, a fitness room, and a beauty salon."),
            'descriptionFr' => Str("Niché au pied des montagnes, notre spa de 1 200 m² est un havre de paix unique dans la région. Pendant votre séjour, vous aurez accès à sept cabines de soins, des piscines intérieure et extérieure, un hammam, un sauna, des jacuzzis, un studio de yoga, une salle de fitness et un salon de beauté."),
            'background_color' => Str('#F0F0E8'),
            'background_opacity' => Str('100'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /// TEAMS ////////////////////////////////////////////////////////////////
        DB::table('teams')->insert([
            'about_description_id' => AboutDescription::findOrFail(2)->id,
            'name' => Str('Le Chadeuf'),
            'descriptionEn' => Str(`"The conductor of the place, he makes the hotel dance to his commands. But don't miss a note, he could make you disappear... into the wine cellar."`),
            'descriptionFr' => Str('“Chef d’orchestre des lieux, il fait danser l’hôtel sur ses ordres. Mais ne ratez pas une note, il pourrait vous faire disparaître… dans la cave à vin.”'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams')->insert([
            'about_description_id' => AboutDescription::findOrFail(2)->id,
            'name' => Str('The Sarrazin'),
            'descriptionEn' => Str(`"A shadowy man with a piercing gaze, he sees everything, knows everything. Including why your wife didn't leave the room this morning."`),
            'descriptionFr' => Str('"Homme de l’ombre au regard perçant, il voit tout, sait tout. Y compris pourquoi votre femme n’a pas quitté la chambre ce matin."'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams')->insert([
            'about_description_id' => AboutDescription::findOrFail(2)->id,
            'name' => Str('Mein Raph'),
            'descriptionEn' => Str('"Master of planning and Machiavellian schemes, nothing escapes him. Except perhaps your breakfast if you dare to arrive late."'),
            'descriptionFr' => Str('"Maître du planning et des plans machiavéliques, rien ne lui échappe. Sauf peut-être votre petit déjeuner si vous osez arriver en retard."'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams')->insert([
            'about_description_id' => AboutDescription::findOrFail(2)->id,
            'name' => Str('The good Bastien'),
            'descriptionEn' => Str('“i bz everyone.”'),
            'descriptionFr' => Str('“je bz tout.”'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /// TEAMS_STRONGEST_POINT ////////////////////////////////////////////////////////////////
        /// CHADEUF
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(1)->id,
            'textEn' => Str('Punctual'),
            'textFr' => Str('Ponctuel'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(1)->id,
            'textEn' => Str('Attention to detail'),
            'textFr' => Str('Sens du détail'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(1)->id,
            'textEn' => Str('Hates dust'),
            'textFr' => Str('Déteste la poussière'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(1)->id,
            'textEn' => Str('Punctual'),
            'textFr' => Str('Ponctuel'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(1)->id,
            'textEn' => Str('Helpful'),
            'textFr' => Str('Serviable'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(1)->id,
            'textEn' => Str('Punctual'),
            'textFr' => Str('Ponctuel'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /// SARRAZIN
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(2)->id,
            'textEn' => Str('Love luxury'),
            'textFr' => Str('Adore le luxe'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(2)->id,
            'textEn' => Str("Don't like when things aren't straight because it makes it difficult to achieve detail alignment."),
            'textFr' => Str('N’aime pas quand les choses ne sont pas droites parce que du coup ça nuit à l’accessibilité de l’harmonisation du détail'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(2)->id,
            'textEn' => Str('Helpful'),
            'textFr' => Str('Serviable'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(2)->id,
            'textEn' => Str('His wife left him and since then he has been drowning himself in alcohol to forget.'),
            'textFr' => Str('Sa femme l’a quittée et depuis il se noie dans l’alcool pour oublier'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        /// Raph
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(3)->id,
            'textEn' => Str('Passionate about the Second World War'),
            'textFr' => Str('Passionné de seconde guerre mondiale'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(3)->id,
            'textEn' => Str('Attention to detail'),
            'textFr' => Str('Sens du détail'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(3)->id,
            'textEn' => Str('Worked for one of the biggest car brands (Mercedes)'),
            'textFr' => Str('A travaillé pour l’une des plus grande marque de voiture (Mercedes)'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(3)->id,
            'textEn' => Str('Always available to find final solutions'),
            'textFr' => Str('Toujours disponible pour trouver des finals solutions'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Bastien
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(4)->id,
            'textEn' => Str('Human'),
            'textFr' => Str('Humain'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(4)->id,
            'textEn' => Str('Kind'),
            'textFr' => Str('Gentil'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(4)->id,
            'textEn' => Str('Adorable'),
            'textFr' => Str('Adorable'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(4)->id,
            'textEn' => Str('Nice'),
            'textFr' => Str('Sympa'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('teams_strongest_point')->insert([
            'teams_id' => Teams::findOrFail(4)->id,
            'textEn' => Str('Cool'),
            'textFr' => Str('Cool'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //PICTURE***************************************************************************************************************

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroom1.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(4)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroom2.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(4)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroom3.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(4)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomArtichaut1.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(2)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomArtichaut2.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(2)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomArtichaut3.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(2)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomRoyal1.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(1)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomRoyal2.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(1)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomRoyal3.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(1)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomX1.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(3)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomX2.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(3)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageBedroomX3.png'),
            'hero_id' => null,
            'bedroomtype_id' => BedroomType::findOrFail(3)->id,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageConciergerie.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => Services::findOrFail(5)->id,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageFibre.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => Services::findOrFail(3)->id,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHeroHotel.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => AboutSection::findOrFail(1)->id,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHeroRestaurant.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => AboutSection::findOrFail(2)->id,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHeroSpa.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => AboutSection::findOrFail(3)->id,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageHotelPresentation.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => AboutDescription::findOrFail(1)->id,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews1.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => News::findOrFail(1)->id,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews2.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => News::findOrFail(2)->id,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews3.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => News::findOrFail(3)->id,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageOpenNews1.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => News::findOrFail(1)->id,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageOpenNews2.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => News::findOrFail(2)->id,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageOpenNews3.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => News::findOrFail(3)->id,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageNews1.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagePackTechnologie.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => Services::findOrFail(2)->id,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagePageAccueil.png'),
            'hero_id' => Hero::findOrFail(1)->id,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagePressing.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => Services::findOrFail(1)->id,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageRestaurant.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => AboutDescription::findOrFail(4)->id,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageSpa1.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => AboutDescription::findOrFail(5)->id,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageSpa2.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => AboutDescription::findOrFail(5)->id,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imageSpa3.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => AboutDescription::findOrFail(5)->id,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/imagevoiturier.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => Services::findOrFail(4)->id,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/Tristan.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => Teams::findOrFail(1)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/Moumen.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => Teams::findOrFail(2)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/Raph.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => Teams::findOrFail(3)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('pictures')->insert([
            'picturePath' => Str('http://127.0.0.1:8000/storage/Bastien.png'),
            'hero_id' => null,
            'bedroomtype_id' => null,
            'news_id' => null,
            'services_id' => null,
            'about_section_id' => null,
            'about_description_id' => null,
            'teams_id' => Teams::findOrFail(4)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        //ICONS*************************************************************************************************************
        DB::table('icon')->insert([
            'name'=>Str('Petit Bonhomme header'),
            'iconPath'=>Str('http://127.0.0.1:8000/storage/contacts_product.png'),
            'link'=>Str('X'),
            'footer_id'=> null,
            'header_id'=>Header::findOrfail(1)->id,
            'bedroom_type_id'=>null,
            'strongest_id'=>null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('Calendrier'),
            'iconPath'=>Str('http://127.0.0.1:8000/storage/calendar.png'),
            'link'=>Str('X'),
            'footer_id'=> null,
            'header_id'=>null,
            'bedroom_type_id'=>BedroomType::findOrfail(4)->id,
            'strongest_id'=>null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('facebook'),
            'iconPath'=>Str('ic:baseline-facebook'),
            'link'=>Str('https://www.facebook.com'),
            'footer_id'=> Footer::findOrfail(1)->id,
            'header_id'=>null,
            'bedroom_type_id'=>null,
            'strongest_id'=>null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('Strongest en forme de maison'),
            'iconPath'=>Str('http://127.0.0.1:8000/storage/home_app_logo.png'),
            'link'=>Str('X'),
            'footer_id'=> null,
            'header_id'=>null,
            'bedroom_type_id'=>null,
            'strongest_id'=>Strongest::findOrfail(1)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('Instagram'),
            'iconPath'=>Str('ri:instagram-fill'),
            'link'=>Str('https://www.instagram.com/'),
            'footer_id'=> Footer::findOrfail(1)->id,
            'header_id'=>null,
            'bedroom_type_id'=>null,
            'strongest_id'=>null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('room service'),
            'iconPath'=>Str('http://127.0.0.1:8000/storage/room_service.png'),
            'link'=>Str('X'),
            'footer_id'=>null,
            'header_id'=>null,
            'bedroom_type_id'=>null,
            'strongest_id'=> Strongest::findOrfail(1)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('Icone strongest en forme de porte'),
            'iconPath'=>Str('http://127.0.0.1:8000/storage/sensor_door.png'),
            'link'=>Str('X'),
            'footer_id'=>null,
            'header_id'=>null,
            'bedroom_type_id'=>null,
            'strongest_id'=> Strongest::findOrfail(1)->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('Shopping bag'),
            'iconPath'=>Str('http://127.0.0.1:8000/storage/shopping_bag.png'),
            'link'=>Str('X'),
            'footer_id'=>null,
            'header_id'=>Header::findOrfail(1)->id,
            'bedroom_type_id'=>BedroomType::findOrfail(4)->id,
            'strongest_id'=> null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('icon')->insert([
            'name'=>Str('X'),
            'iconPath'=>Str('hugeicons:new-twitter'),
            'link'=>Str('https://x.com'),
            'footer_id'=> Footer::findOrfail(1)->id,
            'header_id'=>null,
            'bedroom_type_id'=>null,
            'strongest_id'=>null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
