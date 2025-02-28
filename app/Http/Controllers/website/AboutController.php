<?php

namespace App\Http\Controllers\website;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class AboutController extends Controller
{
    public function allAbout(): object{
        return response()->json(About::all());
    }

    public function aboutUpdate($id, Request $request): object
    {
        $aboutUpdate = $request->validate([
            'background_color' => 'nullable',
            'background_opacity' => 'nullable',
        ]);

        $about = About::findOrFail($id);
        $about->update($aboutUpdate);

        return response()->json($aboutUpdate);

    }
}
//    public function allAbout(): object{
//        $picture = About::with('picture')->get();
//        return response()->json($picture);
//    }
//    public function aboutShowid(Request $request , string $id): object
//    {
//        $validated = $request->validate([
//
//            $aboutId = About::findOrFail($id)]);
//
//        return response()->json([$aboutId]);
//    }

//    public function PostAbout(Request $request)
//    {
//        try {
//            $validate = $request->validate([
//                'title' => 'required|string|max:255',
//                'description' => 'required|string|max:255',
//                'background_color_1' => 'nullable',
//                'background_opacity_1' => 'nullable',
//                'backgroundText_color_1' => 'nullable',
//                'backgroundText_opacity_1' => 'nullable',
//                'backgroundText_color_2' => 'nullable',
//                'backgroundText_opacity_2' => 'nullable',
//            ]);
//
//
//            $postAbout = new About($validate);
//            $postAbout->save();
//            return response()->json($postAbout);
//        } catch (ValidationException $exception) {
//            return response()->json($exception->getMessage());
//        }
//    }
//
//    public function DeleteAbout(Request $request, $id)
//    {
//        $deleteAbout = About::findOrFail($id);
//        $deleteAbout->delete();
//        return response()->json(About::all());
//    }

