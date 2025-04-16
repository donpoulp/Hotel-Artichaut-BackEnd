<?php

namespace App\Http\Controllers\website;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class FooterController extends Controller
{
    public function allFooter(): object
    {
        $icon = Footer::with('icon')->get();

        return response()->json($icon);
    }
    public function footerShowid(string $id): object
    {
        $footerId = Footer::with('icon')->findOrFail($id);

        return response()->json($footerId);
    }
    public function footerUpdate($id, Request $request)
    {
        $footerUpdate = $request->validate([
            'titleEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
            'titleFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
            'textEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
            'textFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
            'background_color' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity' => 'nullable|integer|between:0,100',
            'icon' => 'nullable|array',
        ]);

        $footer = Footer::findOrFail($id);
        $footer->update($footerUpdate);

        if (!empty($footerUpdate['icon'])) {
            foreach ($footerUpdate['icon'] as $iconData) {
                if (isset($iconData['id'])) {
                    $icon = $footer->icon()->find($iconData['id']);
                    if ($icon) {
                        $icon->update([
                            'name' => $iconData['name'] ?? '',
                            'link' => $iconData['link'] ?? '',
                            'iconPath' => $iconData['iconPath'] ?? '',
                        ]);
                    }
                }
            }
        }

        return response()->json($footer->load('icon'));

    }
    public function PostFooter(Request $request)
    {
        try {
            $validate = $request->validate([
                'titleEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
                'titleFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
                'textEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
                'textFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
                'background_color' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'background_opacity' => 'nullable|integer|between:0,100',
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
