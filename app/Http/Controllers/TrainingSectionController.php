<?php

namespace App\Http\Controllers;

use App\Models\TrainingSection;
use Illuminate\Http\Request;

class TrainingSectionController extends Controller
{
    public function getAllTrainingSections()
    {
        $trainingSections = TrainingSection::all();
        $trainingSections->makeHidden(['created_at', 'updated_at']);
        return $trainingSections;
    }

    public function getTrainingSectionById(TrainingSection $trainingSection)
    {
        $trainingSection->makeHidden(['created_at', 'updated_at']);
        return $trainingSection;
    }

    public function postTrainingSection(Request $request)
    {
        if($request->has('id'))
        {
            $trainingSection = TrainingSection::findOrFail($request->id);
            $trainingSection->makeHidden(['created_at', 'updated_at']);
            $trainingSection->fill($request->all());
            $trainingSection->save();
            return $trainingSection;
        }
        $trainingSection = new TrainingSection();
        $trainingSection->makeHidden(['created_at', 'updated_at']);
        $trainingSection->fill($request->all());
        $trainingSection->save();
        return $trainingSection;
    }
}
