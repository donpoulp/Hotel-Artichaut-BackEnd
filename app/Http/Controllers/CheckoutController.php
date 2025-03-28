<?php
namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Routing\Controller;
use Stripe\PaymentIntent;
use Stripe\stripe;

class CheckoutController extends Controller
{
    public function checkout($id)
    {

        $montant= Reservation::findOrfail($id)->price * 100;

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $payment_intent = PaymentIntent::create([

                'description' => 'Code Shotcut Stripe Test Payment',
                'amount' => $montant,
                'currency' => 'eur',
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            return view('credit-card', compact('intent'),['montant'=>$montant/100]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function afterPayment()
    {
        return 'Payment received. Thank you for using our services.';
    }
}
