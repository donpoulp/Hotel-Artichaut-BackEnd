<?php

namespace App\Http\Controllers\website;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

class servicesController extends Controller
{
    public function allServices(): object{
        return response()->json(Services::all());
    }
    public function ServicesShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $ServicesId = Services::findOrFail($id)]);

        return response()->json([$ServicesId]);
    }
    public function UpdateServices($id, Request $request)
    {
        $updateServices = $request->validate([
            'name' => 'nullable',
            'duration' => 'nullable',
            'price' => 'nullable',
            'time' => 'nullable',
            'quantity' => 'nullable',
        ]);

        $Services = Services::findOrFail($id);
        $Services->update($updateServices);

        return response()->json($updateServices);

    }
    public function PostServices(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:20',
                'duration' => 'required|int|max:20',
                'price' => 'required|int|max:200',
                'time' => 'required|int|max:20',
                'quantity' => 'required|int|max:20',
            ]);

            $postServices = new Services($validate);
            $postServices->save();
            return response()->json($postServices);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }

    public function DeleteServices(Request $request, $id)
    {
        $deleteServices = Services::findOrFail($id);
        $deleteServices->delete();
        return response()->json(Services::all());
    }
}
