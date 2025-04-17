<?php

namespace App\Http\Controllers\website;

use App\Models\Services;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ServicesController extends Controller
{
    use PictureTrait;
    public function allServices(): object{
        $picture = Services::with('picture')->get();
        return response()->json($picture);
    }
    public function ServicesShowid(string $id): object
    {

        $ServicesId = Services::findOrFail($id);

        return response()->json($ServicesId);
    }
    public function UpdateServices($id, Request $request)
    {
        $updateServices = $request->validate([
            'nameEn' => 'nullable|string|max:100|regex:/^[^<>{}]+$/',
            'nameFr' => 'nullable|string|max:100|regex:/^[^<>{}]+$/',
            'descriptionEn' => 'nullable|string|max:1000|regex:/^[^<>{}]+$/',
            'descriptionFr' => 'nullable|string|max:1000|regex:/^[^<>{}]+$/',
            'duration' => 'nullable|integer|min:1|max:1000',
            'price' => 'nullable|numeric|min:0|max:999999.99',
            'time' => 'nullable|string|max:50',
            'quantity' => 'nullable|integer|min:1|max:10000',

            'background_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity_1' => 'nullable|integer|between:0,100',

            'backgroundText_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'backgroundText_opacity_1' => 'nullable|integer|between:0,100',

            'backgroundText_color_2' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'backgroundText_opacity_2' => 'nullable|integer|between:0,100',

            'picture' => 'nullable',
        ]);

        $Services = Services::findOrFail($id);

        if (isset($updateServices['picture'])) {
            $oldPicture = $Services->picture()->first();
            if ($oldPicture) {
                if (Storage::exists($oldPicture->picturePath)) {
                    Storage::delete($oldPicture->picturePath);
                }

                $imagePath = $this->saveImage($updateServices['picture']);

                $oldPicture->picturePath = "http://127.0.0.1:8000/storage/" . $imagePath;
                $oldPicture->save();
            }
        }

        $Services->update($updateServices);

        return response()->json($updateServices);

    }
    public function PostServices(Request $request)
    {
        try {
            $validate = $request->validate([
                'nameEn' => 'nullable|string|max:100|regex:/^[^<>{}]+$/',
                'nameFr' => 'nullable|string|max:100|regex:/^[^<>{}]+$/',
                'descriptionEn' => 'nullable|string|max:1000|regex:/^[^<>{}]+$/',
                'descriptionFr' => 'nullable|string|max:1000|regex:/^[^<>{}]+$/',
                'duration' => 'nullable|integer|min:1|max:1000',
                'price' => 'nullable|numeric|min:0|max:999999.99',
                'time' => 'nullable|string|max:50',
                'quantity' => 'nullable|integer|min:1|max:10000',

                'background_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'background_opacity_1' => 'nullable|integer|between:0,100',

                'backgroundText_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'backgroundText_opacity_1' => 'nullable|integer|between:0,100',

                'backgroundText_color_2' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'backgroundText_opacity_2' => 'nullable|integer|between:0,100',

                'picture' => 'nullable',
            ]);

            $postServices = new Services($validate);
            $postServices->save();
            return response()->json($postServices);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteServices(Request $request, $id)
    {
        $deleteServices = Services::findOrFail($id);
        $deleteServices->delete();
        return response()->json(Services::all());
    }
}
