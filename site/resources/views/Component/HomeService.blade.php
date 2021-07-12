<div class="container section-marginTop text-center">
    <h1 class="section-title">Services</h1>
    <h1 class="section-subtitle">Get IT Course and It Services with Source Code</h1>
    <div class="row">
        @foreach($ServiceData as $ServiceData)
        <div class="col-md-3 p-2 ">
            <div class="card service-card text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src="{{$ServiceData->service_img}}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">{{$ServiceData->service_name}}</h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{$ServiceData->service_des}}</h6>
                </div>
            </div>
        </div>
        @endforeach



    </div>
</div>

