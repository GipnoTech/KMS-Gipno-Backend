@if($repo = new \Orchid\Screen\Repository()) @endif

@php
$balls = 0;
$max_balls = 0;
    $res =[];

    foreach ($test->questions as $question ){
        $res[$question->question_number.'_text'] =  $question->text;


        $answers = \App\Models\TestResult::where('test_id', $test->id
        )->where( 'question_id',$question->id)
        ->where('user_id', \Illuminate\Support\Facades\Auth::id())
        ->latest()->first()->answers;
        foreach ($question->answers as $id=>$answer){

        $repo->set($question->id.'_answer_'.$id,$answer['text']);
        $answers = collect($answers)->keyBy('id');

        if($answer['valid']){
            $max_balls++;
        }
        if($answers->has($id)&&$answer['valid']&&$answers[$id]['value']==($answer['valid']?1:0)){

            $res[$question->id.'_answer_'.$id.'_valid']=true;
            $balls+=1;
        }
        else{
            if($answers->has($id)){
            }
            $res[$question->id.'_answer_'.$id.'_valid']=false;

        }





}
}
$b = new \App\Models\TestBalls();
    $b->user_id = \Illuminate\Support\Facades\Auth::id();
    $b->test_id = $test->id;
    $b->balls = (int)($balls/$max_balls*100);
    $b->save();
@endphp
<h2>Точность: {{(int)($balls/$max_balls*100)}}%</h2>
@foreach($test->questions as $question)
    <h2>{{$question->text}}</h2>

    @if($question->answers!=null)
        @forelse($question->answers as $id=>$answer)
            @if($repo->set($question->id.'_answer_'.$id, $answer['text'])) @endif

            {!!
        \Orchid\Support\Facades\Layout::rows([
            \Orchid\Screen\Fields\Group::make([

                \Orchid\Screen\Fields\Label::make($question->id.'_answer_'.$id)->class(
                    $res[$question->id.'_answer_'.$id.'_valid']?'text-success':'text-danger'
                )
                ])->autoWidth()
            ])->build($repo)->render()
        !!}

        @empty
        @endforelse
    @endif

@endforeach

