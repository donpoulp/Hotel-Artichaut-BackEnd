<?php

namespace App\Http\Controllers\website;

use App\Models\Icon;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class IconController extends Controller
{
    public function allIcon(): object
    {
        $icon = Icon::all();
        return response()->json($icon);
    }
    public function iconShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $iconId = Icon::findOrFail($id)]);

        return response()->json([$iconId]);
    }
    public function iconUpdate($id, Request $request)
    {
        $iconUpdate = $request->validate([
            'name' => 'nullable|string|regex:/^[^<>{}]+$/|max:100',
            'iconPath' => 'nullable|string|max:255',
            'link' => 'nullable|url|max:255',
            'footer_id' => 'nullable|integer',
            'header_id' => 'nullable|integer',
            'bedroomtype_id' => 'nullable|integer',
            'strongestype_id' => 'nullable|integer',
        ]);

        $icon = Icon::findOrFail($id);
        $icon->update($iconUpdate);

        return response()->json($iconUpdate);

    }
    public function postIcon(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'nullable|string|regex:/^[^<>{}]+$/|max:100',
                'iconPath' => 'nullable|string|max:255',
                'link' => 'nullable|url|max:255',
                'footer_id' => 'nullable|integer',
                'header_id' => 'nullable|integer',
                'bedroomtype_id' => 'nullable|integer',
                'strongestype_id' => 'nullable|integer',
            ]);


            $postIcon = new News($validate);
            $postIcon->save();
            return response()->json($postIcon);
        } catch (ValidationException $exception) {

            return response()->json($exception->getMessage());
        }
    }

    public function deleteIcon(Request $request, $id)
    {
        $deleteIcon = Icon::findOrFail($id);
        $deleteIcon->delete();
        return response()->json(Icon::all());
    }
}
