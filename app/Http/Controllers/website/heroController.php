<?php

namespace App\Http\Controllers\website;

use App\Models\Header;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class heroController extends Controller
{
    public function allHero(): object{
        return response()->json(Hero::all());
    }
    public function heroShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $heroId = Hero::findOrFail($id)]);

        return response()->json([$heroId]);
    }
    public function heroUpdate($id, Request $request)
    {
        $heroUpdate = $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);

        $hero = Hero::findOrFail($id);
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
