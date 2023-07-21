<?php

namespace App\Orchid\Screens;

use App\Models\Test;
use App\Models\Training;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class TestsScreen extends Screen
{
    public $tests;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tests'=>Test::all()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Тесты';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('')->icon('plus')->method('addTest')->modal('addTest')
        ];
    }

    public function addTest(){
        Test::create([
            'title'=> 'Новый тест '.$this->tests->count()+1,
            'description'=>'Описание',
            'training_id'=> request()->training_id,
        ]);

    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {


        $testsElements = [];


        foreach ($this->tests as $id=>$test){
            $testsElements[] = Layout::view('test-block', ['test'=>$test]);
        }
        return [...$testsElements,
            Layout::modal('addTest',[
                Layout::rows([
            Relation::make('training_id')->fromModel(Training::class,'name')->title('Тема теста')
                ])
            ])->title('Добавить тест')
        ];
    }
}
