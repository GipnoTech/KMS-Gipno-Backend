<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getAllTests()
    {
        $test = Test::all();
        $test->makeHidden(['created_at', 'updated_at']);
        return $test;
    }

    public function getTest(Test $test)
    {
        $test->makeHidden(['created_at', 'updated_at']);
        return $test;
    }

    public function postTest(Request $request){
        if($request->has('id')){
            $training = Test::findOrFail($request->id);
            $training->makeHidden(['created_at', 'updated_at']);
            $training->fill($request->all());
            $training->save();
            return $training;
        }
        $training= new Test();
        $training->makeHidden(['created_at', 'updated_at']);
        $training->fill($request->all());
        $training->save();
        return $training;

    }

    public function getQuestions(Test $test){
        return $test->questions;
    }

}
