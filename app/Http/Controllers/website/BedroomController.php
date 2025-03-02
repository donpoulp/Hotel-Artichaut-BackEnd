<?php

namespace App\Http\Controllers\website;

use App\Models\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class BedroomController extends Controller
{
    public function allBedroom(): object{
        $picture = Bedroom::with('bedroomType','picture')->get();
        return response()->json($picture);
    }
    public function bedroomShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $bedroomId = Bedroom::findOrFail($id)]);

        return response()->json([$bedroomId]);
    }
    public function UpdateBedroom($id, Request $request)
    {
        $updatebedroom = $request->validate([
            'number' => 'nullable',
            'image' => 'nullable',
        ]);

        $bedroom = Bedroom::findOrFail($id);
        $bedroom->update($updatebedroom);

        return response()->json($updatebedroom);

    }
    public function PostBedroom(Request $request)
    {
        try {
            $validate = $request->validate([
                'number' => 'required|string|max:255',
                'image' => 'required|string|max:255',
            ]);


            $postBedroom = new Bedroom($validate);
            $postBedroom->save();
            return response()->json($postBedroom);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteBedroom(Request $request, $id)
    {
        $deleteBedroom = Bedroom::findOrFail($id);
        $deleteBedroom->delete();
        return response()->json(Bedroom::all());
    }
}
