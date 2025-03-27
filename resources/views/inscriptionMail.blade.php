<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <header>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </header>

    <style>
        .h1
        {
            margin: 25%;
        }


    </style>
    <body>
    <h1 class="h1">Merci {{$data ['firstname']}} de votre commande !</h1>
    <br>

    <div>
        <h3>Debut de réservation :  {{$data ['startDate']}}</h3>
        <h3>Fin de réservation   :  {{$data ['endDate']}}</h3>
        <h3>Prix                 :  {{$data ['price']}},00€</h3>
        <h3>Votre Chambre        :  {{$data ['bedroomType']}}</h3>
    </div>
    <br>

    <h2>Toute l'équipe de l'hotel artichaut vous remercie !</h2>
    </body>
</nav>
