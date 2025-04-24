<?php

namespace App\Http\Controllers\website;

use App\Models\Hero;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Schema(
 *     schema="Hero",
 *     type="object",
 *     title="Hero",
 *     required={},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="titleEn", type="string", example="Welcome to our hotel"),
 *     @OA\Property(property="titleFr", type="string", example="Bienvenue dans notre hôtel"),
 *     @OA\Property(property="descriptionEn", type="string", example="Experience comfort like never before"),
 *     @OA\Property(property="descriptionFr", type="string", example="Vivez le confort comme jamais auparavant"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-04-24T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-04-24T12:00:00Z")
 * )
 */
class HeroController extends Controller
{
    use PictureTrait;
    /**
     * @OA\Get(
     *     path="/api/hero",
     *     summary="Récupère tous les héros avec leurs images",
     *     tags={"Hero"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des héros",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Hero"))
     *     )
     * )
     */
    public function allHero(): object{
        $picture = Hero::with('picture')->get();
        return response()->json($picture);
    }
    /**
     * @OA\Get(
     *     path="/api/hero/{id}",
     *     summary="Récupère le hero par ID",
     *     tags={"Hero"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Héros trouvé",
     *         @OA\JsonContent(ref="#/components/schemas/Hero")
     *     )
     * )
     */
    public function heroShowid(Request $request , string $id): object
    {
        $validated = $request->validate([

            $heroId = Hero::findOrFail($id)->with('picture')->get()]);

        return response()->json($heroId);
    }

    /**
     * @OA\Put(
     *     path="/api/hero/{id}",
     *     summary="Met à jour le hero",
     *     tags={"Hero"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Hero")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Héros mis à jour",
     *         @OA\JsonContent(ref="#/components/schemas/Hero")
     *     )
     * )
     */
    public function heroUpdate($id, Request $request)
    {
        $heroUpdate = $request->validate([
            'titleEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
            'titleFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
            'descriptionEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
            'descriptionFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
            'picture' => 'nullable',
        ]);

        $hero = Hero::findOrFail($id);

        if (isset($heroUpdate['picture'])) {
            $oldPicture = $hero->picture()->first();
            if ($oldPicture) {
                if (Storage::exists($oldPicture->picturePath)) {
                    Storage::delete($oldPicture->picturePath);
                }

                $imagePath = $this->saveImage($heroUpdate['picture']);

                $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
                $oldPicture->save();
            }
        }

        $hero->update($heroUpdate);

        return response()->json($heroUpdate);
    }
    /**
     * @OA\Post(
     *     path="/api/hero",
     *     summary="Crée un hero",
     *     tags={"Hero"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Hero")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Héros créé",
     *         @OA\JsonContent(ref="#/components/schemas/Hero")
     *     )
     * )
     */
    public function PostHero(Request $request)
    {
        try {
            $validate = $request->validate([
                'titleEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
                'titleFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:255',
                'descriptionEn' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
                'descriptionFr' => 'nullable|string|regex:/^[^<>{}]+$/|max:1000',
                'picture' => 'nullable',
            ]);


            $postHero = new Hero($validate);
            $postHero->save();
            return response()->json($postHero);
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage());
        }
    }
    /**
     * @OA\Delete(
     *     path="/api/hero/{id}",
     *     summary="Supprime un hero",
     *     tags={"Hero"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Héros supprimé et liste restante retournée",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Hero"))
     *     )
     * )
     */
    public function DeleteHero(Request $request, $id)
    {
        $deleteHero = Hero::findOrFail($id);
        $deleteHero->delete();
        return response()->json(Hero::all());
    }
}
