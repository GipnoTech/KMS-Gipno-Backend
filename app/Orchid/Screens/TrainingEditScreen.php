<?php

namespace App\Orchid\Screens;

use App\Models\Training;
use App\Models\TrainingSection;
use App\Orchid\Layouts\TabEditor;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class TrainingEditScreen extends Screen
{
    public $sections = [];
    public $training;


    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Training $training): iterable
    {
        $vars = [];
        foreach ($training->sections as $sec){
            $vars['section_'.$sec->id] = $sec;
        }
        return [
            'training'=>$training,
            'sections'=>$training->sections,
            ...$vars
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Изменение статьи';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Добавить вкладку')->method('addTabs')->type(Color::DARK),
            Button::make('Сохранить всё')
                ->method('updateAll')->type(Color::DARK),
                Button::make('Удалить статью')
                    ->method('deleteAll')
                    ->parameters(['id'=>$this->training->id])->type(Color::DARK),
        ];
    }

    public function updateAll(){
        foreach ($this->sections as $section)$this->updateTab($section->id);
        $this->training->save();
    }

    public function deleteAll(){
        foreach ($this->sections as $section)$section->delete();
        $this->training->delete();
        return redirect()->route('kms.training');
    }


    public function updateTab($id){
        $section = TrainingSection::where('id', $id)->first();
        $section->fill(request()->input('section_'.$id));
        $section->save();
    }

    public function addTabs(){
        $section = new TrainingSection();
        $section->title = "Новая вкладка " . count($this->sections)+1;
        $section->training_id = $this->training->id;
        $section->save();
        $this->sections[] = $section;
    }
    public function deleteTab($id){
        TrainingSection::where('id',$id)->first()->delete();
    }


    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $tabs = [];
        foreach ($this->sections as $id=>$section) {

            $tabs[$section->title] = Layout::rows([
                Group::make([
                    Button::make()->icon('save')
                        ->method('updateTab')
                        ->parameters(['id'=>$section->id])->class('btn'),
                    Button::make()->icon('trash')
                        ->method('deleteTab')
                        ->parameters(['id'=>$section->id])->class('btn')
                ])->autoWidth()   ,

                Input::make('section_'.$section->id.'.title'),
                SimpleMDE::make('section_'.$section->id.'.content')
            ])
                ;
        }

        return [
            Layout::rows([
                Input::make('training.name')
            ]),

            Layout::tabs($tabs),
        ];
    }
}
