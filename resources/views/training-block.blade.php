<a class="col-xl-11 col-lg-11 col-md-11 d-flex flex-row rounded-4 custom-hover mt-3" style="min-height: 175px;background: #F5F6F8" href="{{route('kms.training.view',['training'=>$training->id])}}">

    <div class="col-xl-2 align-self-start my-auto custom-progress-container" >

            <div class="progress custom-progress-bar" id="progress_bar" data-percentage="{{\App\Models\TestBalls::where('user_id',Illuminate\Support\Facades\Auth::id())->where('test_id',$training->id)->latest()->first()->balls??0}}">
		<span class="progress-left">
			<span class="progress-bar"></span>
		</span>
                <span class="progress-right">
			<span class="progress-bar"></span>
		</span>
                <div class="progress-value custom-progress-bar-text-container">
                    <div class="custom-progress-bar-text" style="font-size: 22px">
                        {{\App\Models\TestBalls::where('user_id',Illuminate\Support\Facades\Auth::id())->where('test_id',$training->id)->latest()->first()->balls??0}}%
                    </div>
                </div>
            </div>

    </div>
    <div class="col-xl-10 d-flex h-100 flex-column custom-content-block">
        <div class="d-flex flex-col text-left min-vh-50 fw-bold mt-4 custom-title" style="font-size: 20px">
            {{$training->name}}
        </div>
        <div class="d-flex flex-col text-left min-vh-50 mt-2 custom-content" style="font-size: 18px">
            {{\Illuminate\Support\Str::limit($training->description, 200)}}
        </div>
        <div class="d-flex flex-col text-left custom-timestamps mt-4" style="font-size: 18px">
           <small> {{'Последнее изменение:'.$training->updated_at.' Автор:'.$training->author}}</small>
        </div>
    </div>


</a>
<script>
    if (document.querySelector('#progress_bar').dataset.percentage<50){
        $('.progress-bar').addClass('bad')
        $('.progress-bar').removeClass('warning')
    }
    if (document.querySelector('#progress_bar').dataset.percentage<80){
        $('.progress-bar').addClass('warning')
        $('.progress-bar').removeClass('bad')
    }



</script>
