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
            'name' => 'nullable',
            'iconPath' => 'nullable',
            'link' => 'nullable',
            'footer_id'=>'nullable',
            'header_id'=>'nullable',
            'bedroomtype_id'=>'nullable',
            'strongestype_id'=>'nullable',

        ]);

        $icon = Icon::findOrFail($id);
        $icon->update($iconUpdate);

        return response()->json($iconUpdate);

    }
    public function postIcon(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'iconPath' => 'required|string|max:255',
                'link' => 'string|max:255',
                'footer_id'=>'string|max:255',
                'header_id'=>'string|max:255',
                'bedroomtype_id'=>'string|max:255',
                'strongestype_id'=>'string|max:255',
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
