<?php

namespace App\Http\Controllers\website;

use App\Models\BedroomType;

use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class BedroomTypeController extends Controller
{
    use PictureTrait;
    public function allBedroomType(): object{

        $icons = BedroomType::with('icon', 'picture')->get();
        return response()->json($icons);

    }
    public function bedroomTypeShowid (string $id): object
    {
        $bedroomTypeId = BedroomType::with('bedroom', 'picture')->findOrFail($id);
        return response()->json($bedroomTypeId);
    }
    public function UpdateBedroomType($id, Request $request)
    {
        $updatebedroomType = $request->validate([
            'nameEn' => 'nullable',
            'descriptionEn' => 'nullable',
            'nameFr' => 'nullable',
            'descriptionFr' => 'nullable',
            'price' => 'nullable',
            'background_color' => 'nullable',
            'background_opacity' => 'nullable',
            'picture1' => 'nullable',
            'picture2' => 'nullable',
            'picture3' => 'nullable',
        ]);

        $bedroomType = BedroomType::findOrFail($id);

            for ($i = 1; $i <= 3; $i++) {
                if (isset($updatebedroomType["picture$i"])) {
                    $oldPicture = $bedroomType->picture()->skip($i - 1)->first();
                    if ($oldPicture) {
                        if (Storage::exists($oldPicture->picturePath)) {
                            Storage::delete($oldPicture->picturePath);
                        }

                        $imagePath = $this->saveImage($updatebedroomType["picture$i"]);

                        $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
                        $oldPicture->save();
                    }
                }
            }

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
