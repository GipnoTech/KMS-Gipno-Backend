<?php

namespace App\Orchid\Screens;

use App\Models\TestQuestion;
use App\Models\TestResult;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class TestingScreen extends Screen
{
    public $test;

    public $activeTab;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(\App\Models\Test $test): iterable
    {
        return [
            'test' => $test,
            'activeTab' => Session::get('question_num')??1
        ];
    }

    public function next()
    {

        $data = request()->all();
        $questionId = TestQuestion::where('test_id', $this->test->id)
            ->where('question_number', $data['question'])->first()->id;
//        dd($data);
        $answers = [];
        $result = TestResult::where('user_id', Auth::user()->id)->where(
            'question_id', $questionId)->where(
            'test_id', $this->test->id)->latest()->first();
        if ($result == null) {
            $result = TestResult::create([
                'user_id' => Auth::id(),
                'question_id' => $questionId,
                'test_id' => $this->test->id,
                'answers' => []
            ]);
        }

        $result->answers = [];
        for ($i = 0; $i < 100; $i++) {
            if (Arr::has($data, $questionId . '_answer_' . $i . '_answer')
                &&
                $data[$questionId. '_answer_' . $i . '_answer'] > 0)
            {

                $result->answers = $result->answers ?? [];
                $result->answers = array_merge($result->answers, [['id' => $i, 'value' => true]]);
                $result->save();
            }
        }
        $this->activeTab = $this->activeTab+1;


            if(TestQuestion::where('test_id',$this->test->id)->where('question_number',$data['question']+1)->first()) {
                return Redirect::back()->with('question_num', $data['question']+1);
            }
            else return redirect()->route('kms.test-result',['test'=>$this->test->id]);

    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Тест на тему:' . $this->test->title;
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Изменить')->route('kms.test.edit', ['test' => $this->test->id])
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {

        $questions = [];
        foreach ($this->test->questions as $question) {
            $questions[$question->question_number . ' '] = Layout::view('questions-section', ['question' => $question]);
        }
        return [


            Layout::tabs($questions)->activeTab($this->activeTab. ' ')

        ];
    }
}
