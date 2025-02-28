<?php

namespace App\Http\Controllers\website;

use App\Models\AboutSection;

class AboutSectionController
{
    public function allAboutSection(): object{
        $about_section = AboutSection::with('picture')->get();
        return response()->json($about_section);
    }
}
