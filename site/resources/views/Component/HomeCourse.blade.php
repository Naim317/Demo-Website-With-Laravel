<div class="container section-marginTop text-center">
    <h1 class="section-title">Courses</h1>
    <h1 class="section-subtitle">Join Our Courses To Get Star Level Service</h1>
    <div class="row">

        @foreach($CourseData as $CourseData)
        <div class="col-md-4 thumbnail-container">
            <img src="{{$CourseData->course_img}}" alt="Avatar" class="thumbnail-image ">
            <div class="thumbnail-middle">
                <h1 class="thumbnail-title">{{$CourseData->course_name}}</h1>
                <h1 class="thumbnail-subtitle">{{$CourseData->course_des}}</h1>
                <h1 class="thumbnail-subtitle">{{$CourseData->course_totalenroll}}</h1>
                <a target="_blank" href="{{$CourseData->course_link}}" class="normal-btn btn">Start Now</a>
            </div>

        </div>
            @endforeach

    </div>
</div>
