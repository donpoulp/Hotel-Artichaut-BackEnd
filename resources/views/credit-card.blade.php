<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hôtel Artichaut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" flex flex-col items-center justify-between min-h-screen">
<div class="bg-green-800 w-full
 p-2">
    <div class="flex justify-center">
        <img src="{{ asset('storage/Logo.png') }}" alt="Logo Hotel Artichaut">
    </div>
</div>
<div class="w-full max-w-2xl">
    <div  id="payment-container">
        <div class="text-lg font-semibold text-black-50 mb-4 text-center">
            <p>Votre montant à régler : {{$montant}},00€ </p>
        </div>
        <!-- Payment form container -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('credit-card') }}" method="post" id="payment-form">
                @csrf

                <div class="mb-4">
                    <div class="information user">

                    </div>
                    <div class="text-lg font-medium mb-2">
                        <label for="card-element">Entrer vos coordonnées bancaires : </label>
                    </div>
                    <input class=" m-2 text-lg font-medium mb-2" placeholder="Nom...">
                    <input class="m-2 text-lg font-medium mb-2" placeholder="Prénom...">
                    <div class="border rounded p-4" id="card-element">

                    </div>
                    <!-- Display card input errors -->
                    <div class="text-red-500 text-sm mt-2" id="card-errors" role="alert"></div>
                    <input type="hidden" name="plan" value="" />
                </div>
                <!-- Submit button section -->
                <div class="text-right">
                    <button
                        id="card-button"
                        class="bg-gray-800 text-white px-6 py-3 rounded hover:bg-gray-900"
                        type="submit"
                        data-secret="{{ $intent }}"
                        onclick= "function closePage() {
                        setTimeout(function (){
                            window.close();
                        },3000);
                        }
                        closePage()"
                    >
                        Payer
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Success message container (hidden initially) -->
    <div id="success-container" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
        <h2 class="text-xl font-semibold">Paiement reussi!</h2>
        <p class="mt-2">Merci pour votre paiement.</p>

    </div>
</div>
<!-- Stripe JS library -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Define style for Stripe elements
    let style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Initialize Stripe and create card element
    const stripe = Stripe('{{ env('STRIPE_KEY') }}', { locale: 'en' });
    const elements = stripe.elements();
    const cardElement = elements.create('card', { style: style });
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    // Mount the card element to the DOM
    cardElement.mount('#card-element');
    // Handle real-time validation errors from the card Element
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        // Confirm the card payment with Stripe
        stripe.handleCardPayment(clientSecret, cardElement, {
            payment_method_data: {}
        })
            .then(function(result) {
                if (result.error) {
                    // Display error if payment fails
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Hide the payment form and show the success message
                    document.getElementById('payment-container').classList.add('hidden');
                    document.getElementById('success-container').classList.remove('hidden');
                }
            });
    });
</script>
<style>

</style>
<div class="bg-green-700 w-full"></div>
</body>
</html>
