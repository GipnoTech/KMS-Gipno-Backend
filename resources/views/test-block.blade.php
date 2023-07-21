<a class="col-xl-11 col-lg-11 col-md-11 d-flex flex-row rounded-4 mt-3 custom-hover" style="min-height: 175px;background: #F5F6F8" href="{{route('kms.test.view',['test'=>$test->id])}}">

    <div class="col-xl-2 align-self-start my-auto custom-progress-container" >

       <img src="{{$test->image}}"/>

    </div>
    <div class="col-xl-10 d-flex h-100 flex-column custom-content-block">
        <div class="d-flex flex-col text-left min-vh-50 fw-bold mt-4 custom-title" style="font-size: 20px">
            {{$test->title}}
        </div>
        <div class="d-flex flex-col text-left min-vh-50 mt-2 custom-content" style="font-size: 18px">
            {{\Illuminate\Support\Str::limit($test->description, 200)}}
        </div>
    </div>


</a>

