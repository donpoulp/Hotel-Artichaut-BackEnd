<?php

namespace App\Http\Controllers\website;

use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutSectionController
{
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
        $about_section->update($about_section_update);
        //dd($about_section);

        return response()->json($about_section);
    }
}
