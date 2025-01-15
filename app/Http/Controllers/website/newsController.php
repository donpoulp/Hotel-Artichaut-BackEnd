<?php

namespace App\Http\Controllers\website;

use App\Models\HeroBtn;
use App\Models\Hotel;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class newsController extends Controller
{
    public function allNews(): object{
        return response()->json(News::all());
    }
    public function hotelShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $hotelId = Hotel::findOrFail($id)]);

        return response()->json([$hotelId]);
    }
    public function hotelUpdate($id, Request $request)
    {
        $hotelUpdate = $request->validate([
            'name' => 'nullable',
            'address' => 'nullable',
            'description' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'postalCode' => 'nullable',
        ]);

        $hotel = Hotel::findOrFail($id);
        $hotel->update($hotelUpdate);

        return response()->json($hotelUpdate);

    }
    public function PostHotel(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'postalCode' => 'required|string|max:255',
            ]);


            $postHotel = new Hotel($validate);
            $postHotel->save();
            return response()->json($postHotel);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteHotel(Request $request, $id)
    {
        $deleteHotel = Hotel::findOrFail($id);
        $deleteHotel->delete();
        return response()->json(Hotel::all());
    }
}
