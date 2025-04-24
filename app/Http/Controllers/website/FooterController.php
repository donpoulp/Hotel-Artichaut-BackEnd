<?php

namespace App\Http\Controllers\website;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\ValidationException;

/**
 * @OA\Schema(
 *     schema="Footer",
 *     type="object",
 *     title="Footer",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="titleEn", type="string", example="Contact Us"),
 *     @OA\Property(property="titleFr", type="string", example="Contactez-nous"),
 *     @OA\Property(property="textEn", type="string", example="Some footer text"),
 *     @OA\Property(property="textFr", type="string", example="Du texte dans le pied de page"),
 *     @OA\Property(property="background_color", type="string", example="#ffffff"),
 *     @OA\Property(property="background_opacity", type="integer", example=80),
 *     @OA\Property(
 *         property="icon",
 *         type="array",
 *         @OA\Items(
 *             type="object",
 *             @OA\Property(property="id", type="integer", example=2),
 *             @OA\Property(property="name", type="string", example="Instagram"),
 *             @OA\Property(property="link", type="string", example="https://instagram.com/example"),
 *             @OA\Property(property="iconPath", type="string", example="/icons/instagram.svg")
 *         )
 *     ),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-04-24T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-04-24T12:00:00Z")
 * )
 */
class FooterController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/footer",
     *     summary="Liste tous les footers avec leurs icônes",
     *     tags={"Footer"},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des footers",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Footer"))
     *     )
     * )
     */
    public function allFooter(): object
    {
        $icon = Footer::with('icon')->get();

        return response()->json($icon);
    }
    /**
     * @OA\Get(
     *     path="/api/footer/{id}",
     *     summary="Afficher un footer par ID",
     *     tags={"Footer"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Footer trouvé",
     *         @OA\JsonContent(ref="#/components/schemas/Footer")
     *     )
     * )
     */
    public function footerShowid(string $id): object
    {
        $footerId = Footer::with('icon')->findOrFail($id);

        return response()->json($footerId);
    }
    /**
     * @OA\Put(
     *     path="/api/footer/{id}",
     *     summary="Mettre à jour un footer",
     *     tags={"Footer"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             allOf={
     *                 @OA\Schema(ref="#/components/schemas/Footer")
     *             }
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Footer mis à jour",
     *         @OA\JsonContent(ref="#/components/schemas/Footer")
     *     )
     * )
     */

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

    /**
     * @OA\Post(
     *     path="/api/footer",
     *     summary="Créer un footer",
     *     tags={"Footer"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Footer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Footer créé",
     *         @OA\JsonContent(ref="#/components/schemas/Footer")
     *     )
     * )
     */
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
