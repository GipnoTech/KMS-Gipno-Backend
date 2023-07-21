<?php

namespace App\Orchid\Layouts;

use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Layout;
use Orchid\Screen\Layouts\Listener;
use Orchid\Screen\Repository;

class TabEditor extends Listener
{
    public $sections;
    public $section;
    public $index;
    public $content;
    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'sections',
        'section',
        'section.content',
        'content'
    ];





    public function __construct($section)
    {
        $this->section = $section;
        $this->content = $section->content;
    }


    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    protected function layouts(): iterable
    {
        dd($this->content);
        return [
            \Orchid\Support\Facades\Layout::rows([
                SimpleMDE::make('content'),
                Button::make("Apply")->method("apply")
            ],

            )
        ];
    }

    /**
     * Update state
     *
     * @param \Orchid\Screen\Repository $repository
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Orchid\Screen\Repository
     */
    public function handle(Repository $repository, Request $request): Repository
    {
        dd($repository);
        return $repository;
    }
}
