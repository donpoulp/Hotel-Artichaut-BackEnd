<?php

namespace  App\Http\Controllers ;

use App\Mail\OrderShipped;
use App\Models\BedroomType;
use App\Models\Reservation;
use App\Models\Services;
use App\Models\User;
use http\Env\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class  MailController  extends  Controller
{

    public  function  sendMail($id): void
    {

        $firstName = Reservation::findOrfail($id)->user_id;
        $bedroomType = Reservation::findOrfail($id)->bedroom_type_id;

        $bedroomTypeName = BedroomType::all()->where('id', '=', $bedroomType)->first()->nameFr;
        $firstNameReservation = User::all()->where('id', '=', $firstName)->first()->firstName;
        $mail = User::all()->where('id', '=', $firstName)->first()->email;


        Mail::to($mail)->send(new OrderShipped ([
            'title' => 'Merci de votre commande',
            'firstname' => $firstNameReservation,
            'startDate' => Reservation::findOrfail($id)->startDate,
            'endDate' => Reservation::findOrfail($id)->endDate,
            'price' => Reservation::findOrfail($id)->price,
            'bedroomType' => $bedroomTypeName,
        ]));

    }
}
