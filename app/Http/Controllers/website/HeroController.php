<?php

namespace App\Http\Controllers\website;

use App\Models\Hero;
use App\Models\Picture;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class HeroController extends Controller
{
    use PictureTrait;
    public function allHero(): object{
        $picture = Hero::with('picture')->get();
        return response()->json($picture);
    }
    public function heroShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $heroId = Hero::findOrFail($id)->with('picture')->get()]);

        return response()->json($heroId);
    }
    public function heroUpdate($id, Request $request)
    {
        $heroUpdate = $request->validate([
            'titleEn' => 'nullable|string',
            'titleFr' => 'nullable|string',
            'descriptionEn' => 'nullable|string',
            'descriptionFr' => 'nullable|string',
            'picture' => 'nullable',
        ]);

        $hero = Hero::findOrFail($id);

        if (isset($heroUpdate['picture'])) {
            $oldPicture = $hero->picture()->first();
            if ($oldPicture) {
                if (Storage::exists($oldPicture->picturePath)) {
                    Storage::delete($oldPicture->picturePath);
                }

                $imagePath = $this->saveImage($heroUpdate['picture']);

                $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
                $oldPicture->save();
            }
        }

        $hero->update($heroUpdate);

        return response()->json($heroUpdate);
    }
    public function PostHero(Request $request)
    {
        try {
            $validate = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'image' => 'required|string|max:255',
            ]);


            $postHero = new Hero($validate);
            $postHero->save();
            return response()->json($postHero);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteHero(Request $request, $id)
    {
        $deleteHero = Hero::findOrFail($id);
        $deleteHero->delete();
        return response()->json(Hero::all());
    }
}
