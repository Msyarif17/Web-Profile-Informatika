<section>
    <div class="container">
        <div class="row pt-md-5  pt-sm-5">
            @include('backend.component.notification')
            <div class="card p-0 overflow-hidden">
                <img src="{{asset('storage'.$content->banner)}}" alt="" class="img-fluid" style="height:500px;object-fit: cover;object-position: center;">
            </div>
        </div>
    </div>
</section>