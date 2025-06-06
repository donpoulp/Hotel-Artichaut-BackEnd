<?php

namespace App\Http\Controllers\website;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class PictureController extends Controller
{
    public function allpicture(): object{

        return response()->json(Picture::all());

    }

    public function PictureShowid(Request $request , string $id): object
    {
        $validated = $request->validate([


            $PictureId = Picture::with('bedroom')->findOrFail($id)]);

        return response()->json([$PictureId]);
    }
    public function UpdatePicture($id, Request $request)
    {
        $updatePicture = $request->validate([
            'picturePath' => 'nullable',
        ]);

        $picture = Picture::findOrFail($id);
        $picture->update($updatePicture);

        return response()->json($updatePicture);

    }
    public function PostPicture(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'nullable',
                'picturePath' => 'nullable|string',
                'hero_id' => 'nullable',
                'bedroom_id' => 'nullable',
                'bedroom_type_id' => 'nullable',
                'news_id' => 'nullable',
                'services_id' => 'nullable',
                'about_section_id' => 'nullable',
                'about_description_id' => 'nullable',
                'teams_id' => 'nullable',
            ]);

            $postPicture = new Picture($validate);
            $postPicture->save();
            return response()->json($postPicture);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeletePicture(Request $request, $id)
    {
        $deletepicture = Picture::findOrFail($id);
        $deletepicture->delete();
        return response()->json(Picture::all());
    }
}
