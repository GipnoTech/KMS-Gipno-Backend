<?php

namespace App\Orchid\Screens;

use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Support\Arr;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class TestEditScreen extends Screen
{
    public $test;
    public $activeTab;


    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Test $test): iterable
    {

        $answers = [];
        foreach ($test->questions as $question) {

            $answers['question_' . $question->question_number . '_text'] = $question->text;
            if ($question->answers != null) {
                foreach ($question->answers as $id => $answer) {
                    $answers['question_' . $question->question_number . '_answer_' . $id] = $answer['text'];

                    $answers['question_' . $question->question_number . '_answer_' . $id . '_valid'] = $answer['valid'];

                }
            }
        }
        return [
            'test' => $test,
            ...$answers
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'TestEditScreen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Добавить вопрос')->method('addQuestion'),
            Button::make('Сохранить все')->method('saveAll')
        ];
    }

    public function saveAll()
    {

        foreach ($this->test->questions as $question) {

            $question->text = request('question_' . $question->question_number . '_text');
            $datas = [];
            for ($i = 0; $i < 100; $i++) {
                if (request()->has('question_' . $question->question_number . '_answer_' . $i)) {
                    $datas[] = [
                        'text' => request('question_' . $question->question_number . '_answer_' . $i),
                        'valid' => request('question_' . $question->question_number . '_answer_' . $i . '_valid')
                    ];
                }
            }

            $question->answers = $datas;
            $question->save();
        }
        $this->test->save();
    }

    public function deleteAnswer($id, $answer_id)
    {
$question = $this->test->questions()->firstWhere('question_number', $id);
        $question->answers = Arr::except($question->answers,$answer_id);
        $question->save();
    }




    public function addQuestion()
    {
        TestQuestion::create([
            'title' => 'Новый вопрос ' . $this->test->questions->count() + 1,
            'text' => 'Текст вопроса',
            'question_number' => $this->test->questions->count() + 1,
            'test_id' => $this->test->id
        ]);
    }


    public function addAnswer()
    {

        $question = TestQuestion::find(request()->question);
        $this->activeTab = $question->question_number;
        $question->answers = array_merge($question->answers ?? [], [['text' => "НОВЫЙ ОТВЕТ", 'valid' => false]]);
        $question->save();
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
            $answers = [];
            if ($question->answers != null) {
                foreach ($question->answers as $id => $answer) {
                    $answers[] = Group::make(
                        [
                            Switcher::make('question_' . $question->question_number . '_answer_' . $id . '_valid'),
                            TextArea::make('question_' . $question->question_number . '_answer_' . $id),
                            Button::make('')->icon('trash')->method('deleteAnswer')->parameters(['id' => $question->question_number, 'answer_id'=>$id]),
                        ]
                    )->autoWidth();
                }
            }
            $questions[$question->question_number . ' '] = Layout::rows(
                [

                    SimpleMDE::make('question_' . $question->question_number . '_text')->title('Текст вопроса'),
                    Button::make("Добавить ответ")->method('addAnswer', [
                        'question' => $question->id,

                    ]), ...$answers]);
        }
        return [


            Layout::tabs($questions)

        ];
    }
}
