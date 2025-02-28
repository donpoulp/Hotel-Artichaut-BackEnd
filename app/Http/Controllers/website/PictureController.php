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
                'picturePath' => 'required|string|max:20',
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
