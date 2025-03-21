<?php

namespace App\Http\Controllers\website;

use App\Models\AboutDescription;
use Illuminate\Http\Request;

class AboutDescriptionController
{
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
        ]);

        $about = AboutDescription::findOrFail($id);
        $about->update($aboutUpdate);


        return response()->json($about);
    }
}
