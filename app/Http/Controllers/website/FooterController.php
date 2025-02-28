<?php

namespace App\Http\Controllers\website;

use App\Models\Footer;
use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class FooterController extends Controller
{
    public function allFooter(): object{
        return response()->json(Footer::all());
    }
    public function footerShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $footerId = Footer::findOrFail($id)]);

        return response()->json([$footerId]);
    }
    public function footerUpdate($id, Request $request)
    {
        $footerUpdate = $request->validate([
            'title' => 'nullable',
            'text' => 'nullable',
            'titleReseau' => 'nullable',
            'iconReseau' => 'nullable',
            'linkReseau' => 'nullable',
            'background_color'=>'nullable',
            'background_opacity'=>'nullable',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->update($footerUpdate);

        return response()->json($footerUpdate);

    }
    public function PostFooter(Request $request)
    {
        try {
            $validate = $request->validate([
                'title' => 'required|string|max:255',
                'text' => 'required|string|max:255',
                'titleReseau' => 'required|string|max:255',
                'iconReseau' => 'required|string|max:255',
                'linkReseau' => 'required|string|max:255',
                'background_color'=>'nullable',
                'background_opacity'=>'nullable',
            ]);


            $postFooter = new Footer($validate);
            $postFooter->save();
            return response()->json($postFooter);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteFooter(Request $request, $id)
    {
        $deleteFooter = Footer::findOrFail($id);
        $deleteFooter->delete();
        return response()->json(Footer::all());
    }
}
