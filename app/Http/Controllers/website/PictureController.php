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
            'name' => 'nullable|string|max:255|regex:/^[^<>{}]+$/',
            'picturePath' => 'nullable|string|max:255',
            'hero_id' => 'nullable|integer|exists:heroes,id',
            'bedroom_id' => 'nullable|integer|exists:bedrooms,id',
            'bedroom_type_id' => 'nullable|integer|exists:bedroom_types,id',
            'news_id' => 'nullable|integer|exists:news,id',
            'services_id' => 'nullable|array',
            'services_id.*' => 'integer|exists:services,id',
            'about_section_id' => 'nullable|integer|exists:about_sections,id',
            'about_description_id' => 'nullable|integer|exists:about_descriptions,id',
            'teams_id' => 'nullable|integer|exists:teams,id',
        ]);

        $picture = Picture::findOrFail($id);
        $picture->update($updatePicture);

        return response()->json($updatePicture);

    }
    public function PostPicture(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|regex:/^[^<>{}]+$/|max:255',
                'picturePath' => 'required|string|max:255',
                'hero_id' => 'nullable|integer|exists:heroes,id',
                'bedroom_id' => 'nullable|integer|exists:bedrooms,id',
                'bedroom_type_id' => 'nullable|integer|exists:bedroom_types,id',
                'news_id' => 'nullable|integer|exists:news,id',
                'services_id' => 'nullable|array',
                'services_id.*' => 'integer|exists:services,id',
                'about_section_id' => 'nullable|integer|exists:about_sections,id',
                'about_description_id' => 'nullable|integer|exists:about_descriptions,id',
                'teams_id' => 'nullable|integer|exists:teams,id',
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
