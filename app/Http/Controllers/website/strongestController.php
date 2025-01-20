<?php

namespace App\Http\Controllers\website;

use App\Models\Strongest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class strongestController
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
            'background_color_1' => 'nullable',
            'background_opacity_1' => 'nullable',
            'background_color_2' => 'nullable',
            'background_opacity_2' => 'nullable'
        ]);

        $strongest = Strongest::findOrFail($id);
        $strongest->update($updatestrongest);

        return response()->json($updatestrongest);

    }
    public function PostStrongest(Request $request)
    {
        try {
            $validate = $request->validate([
                'background_color_1' => 'nullable',
                'background_opacity_1' => 'nullable',
                'background_color_2' => 'nullable',
                'background_opacity_2' => 'nullable'
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
