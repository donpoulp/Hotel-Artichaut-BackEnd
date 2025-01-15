<?php

namespace App\Http\Controllers\website;

use App\Models\HeroBtn;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class heroBtnController extends Controller
{
    public function allHeroBtn(): object{
        return response()->json(HeroBtn::all());
    }
    public function heroBtnShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $heroBtnId = HeroBtn::findOrFail($id)]);

        return response()->json([$heroBtnId]);
    }
    public function heroBtnUpdate($id, Request $request)
    {
        $heroBtnUpdate = $request->validate([
            'text' => 'nullable',
            'action' => 'nullable',
            'backgroundColor' => 'nullable',
            'textColor' => 'nullable',
        ]);

        $heroBtn = HeroBtn::findOrFail($id);
        $heroBtn->update($heroBtnUpdate);

        return response()->json($heroBtnUpdate);

    }
    public function PostHeroBtn(Request $request)
    {
        try {
            $validate = $request->validate([
                'text' => 'required|string|max:255',
                'action' => 'required|string|max:255',
                'backgroundColor' => 'required|string|max:255',
                'textColor' => 'required|string|max:255',
            ]);


            $postHeroBtn = new HeroBtn($validate);
            $postHeroBtn->save();
            return response()->json($postHeroBtn);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteHeroBtn(Request $request, $id)
    {
        $deleteHeroBtn = HeroBtn::findOrFail($id);
        $deleteHeroBtn->delete();
        return response()->json(HeroBtn::all());
    }
}
