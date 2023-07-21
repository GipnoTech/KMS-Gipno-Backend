<?php

namespace App\Orchid\Screens;

use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class TestResultScreen extends Screen
{

    public $answers;

    public $test;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Test $test): iterable
    {
        return ['test'=>$test];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'TestResultScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $testResult = [];
        foreach ($this->test->questions as $question){
            $testResult[] = Layout::view('test-result', ['question'=>$question,'test'=>$this->test]);
        }
        return [
            Layout::view('test-result', ['test'=>$this->test])
        ];
        return [];
    }
}
