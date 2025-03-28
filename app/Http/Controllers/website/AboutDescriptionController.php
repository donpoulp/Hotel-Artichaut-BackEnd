<?php

namespace App\Http\Controllers\website;

use App\Models\AboutDescription;
use App\Models\Picture;
use App\Traits\PictureTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutDescriptionController
{
    use PictureTrait;
    public function allAboutDescription(): object{
        $about_desc = AboutDescription::with('picture', 'teams', "teams.teams_strongest_point", "teams.picture")->get();


        return response()->json($about_desc);
    }

    public function getAboutDescriptionByAboutSectionId(int $id): object{
        $about_desc = AboutDescription::with('picture', 'teams', "teams.teams_strongest_point", "teams.picture")->where('about_section_id', $id)->get();
        return response()->json($about_desc);
    }

    public function putAboutDescription(int $id, Request $request):object{
        $aboutUpdate = $request->validate([
            'titleEn' => 'nullable',
            'titleFr' => 'nullable',
            'descriptionEn' => 'nullable',
            'descriptionFr' => 'nullable',
            'background_color' => 'nullable',
            'background_opacity' => 'nullable',
            'picture1' => 'nullable',
            'picture2' => 'nullable',
            'picture3' => 'nullable',
        ]);

        $about = AboutDescription::findOrFail($id);

        if (isset($aboutUpdate['picture1']) && ($id == 1 || $id == 4)) {
            $oldPicture = $about->picture()->first();
            if ($oldPicture) {
                if (Storage::exists($oldPicture->picturePath)) {
                    Storage::delete($oldPicture->picturePath);
                }

                $imagePath = $this->saveImage($aboutUpdate['picture1']);

                $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
                $oldPicture->save();
            }
        } elseif ((isset($aboutUpdate['picture1']) || isset($aboutUpdate['picture2']) || isset($aboutUpdate['picture3'])) && $id == 5) {
            for ($i = 1; $i <= 3; $i++) {
                if (isset($aboutUpdate["picture$i"])) {
                    $oldPicture = $about->picture()->skip($i - 1)->first();

                    if ($oldPicture) {
                        if (Storage::exists($oldPicture->picturePath)) {
                            Storage::delete($oldPicture->picturePath);
                        }

                        $imagePath = $this->saveImage($aboutUpdate["picture$i"]);

                        $oldPicture->picturePath = "http://127.0.0.1:8000/storage/".$imagePath;
                        $oldPicture->save();
                    }
                }
            }
        }

        $about->update($aboutUpdate);


        return response()->json($about);
    }
}
