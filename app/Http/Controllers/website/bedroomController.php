<?php

namespace App\Http\Controllers\website;

use App\Models\Bedroom;
use Illuminate\Routing\Controller;

class bedroomController extends Controller
{
    public function allBedroom(): object{
        return response()->json(Bedroom::all());
    }
}
