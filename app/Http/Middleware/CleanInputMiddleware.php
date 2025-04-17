<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CleanInputMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Fonction pour clean toute les entrées utilisateurs de type [string, int, array, file]

        // TYPE STRING :
        // - trim() va enlever les espaces ou caractère invisible en debut et fin d'une entrée
        // - strip_tags() Supprime toutes les balises HTML ou JavaScript d’un texte

        // TYPE INT :
        // - filter_var() verifie la validiter de la valeur numerique donc pas de script ou de balise

        // TYPE FILE :
        // - on va verifier si c'est bien un fichier jpeg jpe png ou pdf ce qui va eviter detre un .js ou .html
        // - puis on verifie pour la taille du fichier

        // TYPE ARRAY :
        // - on a la fonction clean array qui va nettoyer les champs du tableau

        $cleaned = $request->all();

        foreach ($cleaned as $key => $value) {
            if (is_string($value)) {
                $value = strip_tags($value);
                $value = preg_replace('/(alert|onerror|onload|javascript|)/i', '', $value);
                $value = str_replace(['<', '>', '(', ')'], '', $value);
                $cleaned[$key] = $value;
            } elseif (is_int($value)) {
                $cleaned[$key] = filter_var($value, FILTER_VALIDATE_INT);
            } elseif (is_array($value)) {
                $cleaned[$key] = $this->cleanArray($value);
            } elseif (is_array($value) && isset($value['name'], $value['base64'])) {
                if (!$this->isValidBase64File($value)) {
                    abort(400, 'Fichier base64 invalide ou trop volumineux.');
                }

                $cleaned[$key] = $value;
            } else {
                $cleaned[$key] = $value;
            }
        }

        $request->merge($cleaned);

        return $next($request);
    }

    private function cleanArray(array $data): array
    {
        $cleaned = [];

        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $value = strip_tags($value);
                $value = preg_replace('/(alert|onerror|onload|javascript)/i', '', $value);
                $value = str_replace(['<', '>', '(', ')'], '', $value);
                $cleaned[$key] = $value;
            } elseif (is_int($value)) {
                $cleaned[$key] = filter_var($value, FILTER_VALIDATE_INT); // Assure que c'est bien un entier valide
            } elseif (is_array($value)) {
                $cleaned[$key] = $this->cleanArray($value);
            } else {
                $cleaned[$key] = $value;
            }
        }

        return $cleaned;
    }

    private function isValidBase64File(array $file): bool
    {
        $allowedExtensions = ['png', 'jpeg', 'jpg', 'pdf'];
        $allowedMimeTypes = [
            'data:image/png',
            'data:image/jpeg',
            'data:application/pdf'
        ];

        $name = $file['name'];
        $base64 = $file['base64'];

        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if (!in_array($extension, $allowedExtensions)) {
            return false;
        }

        $mimeValid = false;
        foreach ($allowedMimeTypes as $type) {
            if (str_starts_with($base64, $type)) {
                $mimeValid = true;
                break;
            }
        }

        if (!$mimeValid) {
            return false;
        }

        $base64Stripped = preg_replace('#^data:\w+/\w+;base64,#i', '', $base64);

        $decoded = base64_decode($base64Stripped, true);
        if (!$decoded) {
            return false;
        }

        $size = strlen($decoded);
        if ($size > 1024 * 1024) {
            return false;
        }

        return true;
    }
}

