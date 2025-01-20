<?php

namespace App\Http\Controllers\website;

use App\Models\Strongest;
use App\Models\StrongestSection;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class strongestSectionController extends Controller
{
    public function allStrongestSection(): object{
        return response()->json(StrongestSection::all());
    }

    public function StrongestSectionShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $strongestId = StrongestSection::findOrFail($id)]);

        return response()->json([$strongestId]);
    }
    public function UpdateStrongestSection($id, Request $request)
    {
        $updatestrongest = $request->validate([
            'icon' => 'nullable',
            'text' => 'nullable',
        ]);

        $strongest = StrongestSection::findOrFail($id);
        $strongest->update($updatestrongest);

        return response()->json($updatestrongest);

    }
    public function PostStrongestSection(Request $request)
    {
        try {
            $validate = $request->validate([
                'icon' => 'nullable',
                'text' => 'nullable',
            ]);


            $poststrongest = new StrongestSection($validate);
            $poststrongest->save();
            return response()->json($poststrongest);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteStrongestSection(Request $request, $id)
    {
        $deleteStrongest = StrongestSection::findOrFail($id);
        $deleteStrongest->delete();
        return response()->json(StrongestSection::all());
    }
}
