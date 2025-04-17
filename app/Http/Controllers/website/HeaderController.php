<?php

namespace App\Http\Controllers\website;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class HeaderController extends Controller
{
    public function allHeader(): object{
        $icon=Header::with('icon')->get();
        return response()->json($icon);
    }
    public function headerShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $headerId = Header::findOrFail($id)]);

        return response()->json([$headerId]);
    }
    public function headerUpdate($id, Request $request)
    {
        $headerUpdate = $request->validate([
            'logo' => 'nullable',
            'icone' => 'nullable',
            'background_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'background_opacity_1' => 'nullable|integer|between:0,100',
            'fondus_color_2' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
            'fondus_opacity_2' => 'nullable|integer|between:0,100',
        ]);

        $header = Header::findOrFail($id);
        $header->update($headerUpdate);

        return response()->json($headerUpdate);

    }
    public function PostHeader(Request $request)
    {
        try {
            $validate = $request->validate([
                'logo' => 'nullable',
                'icone' => 'nullable',
                'background_color_1' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'background_opacity_1' => 'nullable|integer|between:0,100',
                'fondus_color_2' => 'nullable|string|regex:/^#[0-9a-fA-F]{3,6}$/',
                'fondus_opacity_2' => 'nullable|integer|between:0,100',
            ]);


            $postHeader = new Header($validate);
            $postHeader->save();
            return response()->json($postHeader);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteHeader(Request $request, $id)
    {
        $deleteHeader = Header::findOrFail($id);
        $deleteHeader->delete();
        return response()->json(Header::all());
    }
}
