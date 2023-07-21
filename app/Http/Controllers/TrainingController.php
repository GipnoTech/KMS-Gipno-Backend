<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function getAllTrainings()
    {
        $trainings = Training::all();
        $trainings->makeHidden(['created_at', 'updated_at']);
        return $trainings;
    }

    public function getTraining(Training $training)
    {
        $training->makeHidden(['created_at', 'updated_at']);
        return $training;
    }

    public function postTraining(Request $request)
    {
        if($request->has('id'))
        {
            $training = Training::findOrFail($request->id);
            $training->makeHidden(['created_at', 'updated_at']);
            $training->fill($request->all());
            $training->save();
            return $training;
        }
        $training= new Training();
        $training->makeHidden(['created_at', 'updated_at']);
        $training->fill($request->all());
        $training->save();
        return $training;
    }



}
