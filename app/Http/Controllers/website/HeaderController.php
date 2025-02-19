<?php

namespace App\Http\Controllers\website;

use App\Models\Header;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class HeaderController extends Controller
{
    public function allHeader(): object{
        return response()->json(Header::all());
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
            'backgroundColor' => 'nullable',
            'logo' => 'nullable',
            'icone' => 'nullable',
        ]);

        $header = Header::findOrFail($id);
        $header->update($headerUpdate);

        return response()->json($headerUpdate);

    }
    public function PostHeader(Request $request)
    {
        try {
            $validate = $request->validate([
                'backgroundColor' => 'required|string|max:255',
                'logo' => 'required|string|max:255',
                'icone' => 'required|string|max:255',
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
