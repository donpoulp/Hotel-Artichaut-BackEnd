<?php

namespace App\Http\Controllers\website;

use App\Models\AboutSection;
use App\Models\Picture;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController
{
    use PictureTrait;
    public function allAboutSection(): object{
        $about_section = AboutSection::with('picture')->get();
        return response()->json($about_section);
    }

    public function putAboutSection(int $id, Request $request): object{
        $about_section_update = $request->validate([
            'titleEn' => 'nullable',
            'titleFr' => 'nullable',
            'picture' => 'nullable',
        ]);

        $about_section = AboutSection::findOrFail($id);

        if (isset($about_section_update['picture'])) {
            $oldPicture = $about_section->picture()->first();
            if ($oldPicture) {
                if (Storage::exists($oldPicture->picturePath)) {
                    Storage::delete($oldPicture->picturePath);
                }
            }
            $imagePath = $this->saveImage($about_section_update['picture']);
            $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
            $oldPicture->save();
        }

        $about_section->update($about_section_update);

        return response()->json($about_section);
    }
}
