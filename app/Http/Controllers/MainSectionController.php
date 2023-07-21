<?php

namespace App\Http\Controllers;

use App\Models\MainSection;
use Illuminate\Http\Request;

class MainSectionController extends Controller
{
    public function getAllMainSections()
    {
        $mainSections = MainSection::all();
        $mainSections->makeHidden(['created_at', 'updated_at']);
        return $mainSections;
    }

    public function getMainSectionById(MainSection $mainSection)
    {
        $mainSection->makeHidden(['created_at', 'updated_at']);
        return $mainSection;
    }

    public function postMainSection(Request $request)
    {
        if($request->has('id'))
        {
            $mainSection = MainSection::findOrFail($request->id);
            $mainSection->makeHidden(['created_at', 'updated_at']);
            $mainSection->fill($request->all());
            $mainSection->save();
            return $mainSection;
        }
        $mainSection = new MainSection();
        $mainSection->makeHidden(['created_at', 'updated_at']);
        $mainSection->fill($request->all());
        $mainSection->save();
        return $mainSection;
    }
}
