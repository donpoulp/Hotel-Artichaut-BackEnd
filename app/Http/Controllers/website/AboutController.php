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
            'background_color' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity' => 'nullable|integer|between:0,100',
        ]);

        $about = About::findOrFail($id);
        $about->update($aboutUpdate);

        return response()->json($aboutUpdate);

    }
}
