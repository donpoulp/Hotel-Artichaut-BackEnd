<?php

namespace App\Http\Controllers\website;

use App\Models\BedroomType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class bedroomTypeController extends Controller
{
    public function allBedroomType(): object{
        return response()->json(BedroomType::all());
    }
    public function bedroomTypeShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $bedroomTypeId = BedroomType::findOrFail($id)]);

        return response()->json([$bedroomTypeId]);
    }
    public function UpdateBedroomType($id, Request $request)
    {
        $updatebedroomType = $request->validate([
            'name' => 'nullable',
            'description' => 'nullable|longtext',
            'price' => 'nullable',
        ]);

        $bedroomType = BedroomType::findOrFail($id);
        $bedroomType->update($updatebedroomType);

        return response()->json($updatebedroomType);

    }
    public function PostBedroomType(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|longtext',
                'price' => 'required|string|max:255',
            ]);


            $postBedroomType = new BedroomType($validate);
            $postBedroomType->save();
            return response()->json($postBedroomType);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteBedroomType(Request $request, $id)
    {
        $deleteBedroomType = BedroomType::findOrFail($id);
        $deleteBedroomType->delete();
        return response()->json(BedroomType::all());
    }
}
