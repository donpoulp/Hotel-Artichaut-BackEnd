<?php

namespace App\Http\Controllers\website;

use App\Models\Strongest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class strongestController extends Controller
{
    public function allStrongest(): object{
        return response()->json(Strongest::all());
    }

    public function StrongestShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $strongestId = Strongest::findOrFail($id)]);

        return response()->json([$strongestId]);
    }
    public function UpdateStrongest($id, Request $request)
    {
        $updatestrongest = $request->validate([
            'icon' => 'nullable',
            'text' => 'nullable',
            'backgroundColor' => 'nullable',
        ]);

        $strongest = Strongest::findOrFail($id);
        $strongest->update($updatestrongest);

        return response()->json($updatestrongest);

    }
    public function PostStrongest(Request $request)
    {
        try {
            $validate = $request->validate([
                'icon' => 'required|string|max:50',
                'text' => 'required|string|max:50',
                'backgroundColor' => 'required|string|string|max:70',

            ]);


            $poststrongest = new Strongest($validate);
            $poststrongest->save();
            return response()->json($poststrongest);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteStrongest(Request $request, $id)
    {
        $deleteStrongest = Strongest::findOrFail($id);
        $deleteStrongest->delete();
        return response()->json(Strongest::all());
    }
}
