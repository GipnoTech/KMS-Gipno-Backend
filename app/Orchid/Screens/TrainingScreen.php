<?php

namespace App\Orchid\Screens;

use App\Models\Training;

use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class TrainingScreen extends Screen
{
    public $trainings;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'trainings' => Training::all()
        ];

    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Обучение';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Добавить статью')->icon('new')->method('addTraining')
        ];
    }

    public function addTraining(){

        Training::create([
            'name'=>'Новая статья ' . count($this->trainings)+1,
            'description' => 'Текст статьи',
            'author' => Auth::user()->name
        ]);
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {

        $trainingsElements = [];


        foreach ($this->trainings as $id=>$training){
            $trainingsElements[] = Layout::view('training-block', ['training'=>$training]);
        }
        #dd($trainingsElements);
        return

                $trainingsElements

        ;
    }
}
