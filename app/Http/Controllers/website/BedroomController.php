<?php

namespace App\Http\Controllers\website;

use App\Models\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class BedroomController extends Controller
{
    public function allBedroom(): object{
        $picture = Bedroom::with('bedroom_type')->get();
        return response()->json($picture);
    }
    public function bedroomShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $bedroomId = Bedroom::findOrFail($id)]);

        return response()->json($bedroomId);
    }
    public function UpdateBedroom($id, Request $request)
    {
        $updatebedroom = $request->validate([
            'number' => 'required|string|unique:bedroom|max:255',
            'bedroom_type_id' => 'required|integer|exists:bedroom_type,id',
        ]);

        $bedroom = Bedroom::findOrFail($id);
        $bedroom->update($updatebedroom);

        return response()->json($updatebedroom);

    }
    public function PostBedroom(Request $request)
    {
        $validate = $request->validate([
            'number' => 'required|string|unique:bedroom|max:255',
            'bedroom_type_id' => 'required|integer|exists:bedroom_type,id',
        ]);

        $postBedroom = new Bedroom($validate);
        $postBedroom->save();
        return response()->json($postBedroom);
    }

    public function DeleteBedroom(Request $request, $id)
    {
        $deleteBedroom = Bedroom::findOrFail($id);
        $deleteBedroom->delete();
        return response()->json(Bedroom::all());
    }
}
