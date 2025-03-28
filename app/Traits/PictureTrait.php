<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
trait PictureTrait
{
    /**
     * Enregistre l'image dans le storage et retourne le chemin du fichier.
     *
     * @param  array  $imageData
     * @param  string  $folder
     * @return string
     */
    public function saveImage($imageData)
    {
        if (!isset($imageData['base64']) || !isset($imageData['name'])) {
            throw new \Exception('Base64 or name field missing from image data.');
        }

        $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData['base64']));

        $fileName = time() . '_' . $imageData['name'];
        $filePath = $fileName;

        Storage::disk('public')->put($filePath, $decodedImage);

        return $filePath;
    }
}
