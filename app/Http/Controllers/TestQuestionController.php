<?php

namespace App\Http\Controllers;

use App\Models\TestQuestion;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function getAllTestQuestions()
    {
        $testQuestions = TestQuestion::all();
        $testQuestions->makeHidden(['created_at', 'updated_at']);
        return $testQuestions;
    }

    public function getTestQuestionById(TestQuestion $testQuestion)
    {
        $testQuestion->makeHidden(['created_at', 'updated_at']);
        return $testQuestion;
    }

    public function postTestQuestion(Request $request)
    {
        if($request->has('id'))
        {
            $testQuestion = TestQuestion::findOrFail($request->id);
            $testQuestion->makeHidden(['created_at', 'updated_at']);
            $testQuestion->fill($request->all());
            $testQuestion->save();
            return $testQuestion;
        }
        $testQuestion = new TestQuestion();
        $testQuestion->makeHidden(['created_at', 'updated_at']);
        $testQuestion->fill($request->all());
        $testQuestion->save();
        return $testQuestion;
    }
}
