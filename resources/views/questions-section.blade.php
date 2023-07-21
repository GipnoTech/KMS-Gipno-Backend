@php use Illuminate\Support\Arr;use Orchid\Screen\Actions\Button;use Orchid\Screen\Fields\CheckBox;use Orchid\Screen\Fields\Group;use Orchid\Screen\Fields\Label;use Orchid\Screen\Repository;use Orchid\Support\Facades\Layout; @endphp
{{$question->title}}

{!! $question->text!!}


@if($repo = new Repository()) @endif

@php
    $answers = [];
                $result = \App\Models\TestResult::where('user_id', Auth::user()->id)->where(
                    'question_id', $question->id)->where(
                    'test_id', $question->test->id)->latest()->first();

                if ($result != null) {
                    foreach ($result->answers as $answer){
                        $answers[$question->id . '_answer_' . $answer['id'] . '_answer'] = $answer['value']?1:0;
                    }

                }



@endphp

@if($question->answers!=null)
    @forelse($question->answers as $id=>$answer)
        @if($repo->set($question->id.'_answer_'.$id, $answer['text'])) @endif
        @if(Arr::has($answers,$question->id.'_answer_'.$id.'_answer'))

            @if($repo->set($question->id.'_answer_'.$id.'_answer', 1)) @endif
        @endif
        {!!
    Layout::rows([
        Group::make([

            Label::make($question->id.'_answer_'.$id),
            CheckBox::make($question->id.'_answer_'.$id.'_answer')->sendTrueOrFalse()
            ])->autoWidth()
        ])->build($repo)->render()
    !!}

    @empty
    @endforelse
@endif

{{Button::make('Следующий вопрос')->method('next')->parameters([...$repo->toArray(), 'question'=>$question->question_number])->class('btn btn-primary')->render()}}

<style>

    .nav-tabs-alt .nav-tabs .nav-item .nav-link {
        background: #BCBFC6 !important;
        color: white !important;
        border-radius: 20px !important;
        width: 55px !important;
        height: 55px !important;
        margin: 7px !important;

        color: white !important;
    }

    .nav-tabs-alt .nav-tabs .nav-item .nav-link.active {
        background: #4B51EA !important;
        border-bottom-width: 0 !important;
    }
</style>
