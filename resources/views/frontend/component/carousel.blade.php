<section class="container-fluid p-0">
    <div id="indicate" style="background-color:{{$cui->navbar_color }};height: 500px;" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            @foreach ($banners as $key=>$banner)
                @if ($key == 0)
                    <button type="button" data-bs-target="#indicate" data-bs-slide-to="{{ $key }}" class="active"
                        aria-current="true" aria-label="{{'Slide'.$key+1 }}"></button>
                    @else
                    <button type="button" data-bs-target="#indicate" data-bs-slide-to="{{ $key }}" 
                        aria-label="{{'Slide'.$key+1 }}"></button>
                @endif
            @endforeach


        </div>
        <div class="carousel-inner">
            @foreach ($banners as $key=>$banner)
                @if ($key == 0)
                    
                <div class="carousel-item active">
                    
                    <div class="jumbotron p-0 mb-0 m"
                        style=" background-color:{{$cui->navbar_color }};height: 500px;  background-image:url('{{ asset('storage' . $banner->image) }}') ; background-size: cover;background-repeat: no-repeat;background-position:center center; ">

                        <div class="py-0 h-100">
                            <div class="container d-flex py-0 h-100" style="">
                                <div class="row justify-content-center align-self-center">
                                    <div class="row m-0 p-0 ">
                                        <div class="col-12" style="color: white;">
                                            <b>
                                                <h1 class="text-capitalize" style="font-size: 20px;font-weight:1000">
                                                    {{ $banner->title_2 }}
                                                </h1>
                                            </b>
                                            <b>
                                                <h1 class="text-capitalize" style="font-size: 40px;font-weight:1000">
                                                    {{ $banner->title_1 }}
                                                </h1>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12" style="color: white;">
                                            {!! $banner->title_3 ? '<p style="font-size: 18px;font-weight:1000">' . $banner->title_3 . '</p>' : '' !!}
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12">
                                            @if ($banner->page_id)
                                                <a
                                                    href="{{ route('page', Page::find($banner->page_id)->first()->slug) }}"><button
                                                        class="btn btn-primary border-0"
                                                        style="background-color: {{ $banner->button_color }};">
                                                        <p class="p-0 m-0" style="font-weight:1000">
                                                            {{ $banner->button_title }}</p>
                                                    </button></a>
                                            @elseif ($banner->post_id)
                                                <a
                                                    href="{{ route('page', Post::find($banner->post_id)->first()->slug) }}"><button
                                                        class="btn btn-primary border-0"
                                                        style="background-color: {{ $banner->button_color }};">
                                                        <p class="p-0 m-0" style="font-weight:1000">
                                                            {{ $banner->button_title }}</p>
                                                    </button></a>
                                            @else
                                                <a href="{{ url($banner->url) }}"><button
                                                        class="btn btn-primary border-0"
                                                        style="background-color: {{ $banner->button_color }};">
                                                        <p class="p-0 m-0" style="font-weight:1000">
                                                            {{ $banner->button_title }}</p>
                                                    </button></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="carousel-item active">
                    
                    <div class="jumbotron p-0 mb-0 m"
                        style=" background-color:{{$cui->navbar_color }};height: 500px;  background-image:url('{{ asset('storage' . $banner->image) }}') ; background-size: cover;background-repeat: no-repeat;background-position:center center; ">

                        <div class="py-0 h-100">
                            <div class="container d-flex py-0 h-100" style="">
                                <div class="row justify-content-center align-self-center">
                                    <div class="row m-0 p-0 ">
                                        <div class="col-12" style="color: white;">
                                            <b>
                                                <h1 class="text-capitalize" style="font-size: 20px;font-weight:1000">
                                                    {{ $banner->title_2 }}
                                                </h1>
                                            </b>
                                            <b>
                                                <h1 class="text-capitalize" style="font-size: 40px;font-weight:1000">
                                                    {{ $banner->title_1 }}
                                                </h1>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12" style="color: white;">
                                            {!! $banner->title_3 ? '<p style="font-size: 18px;font-weight:1000">' . $banner->title_3 . '</p>' : '' !!}
                                        </div>
                                    </div>
                                    <div class="row m-0 p-0">
                                        <div class="col-12">
                                            @if ($banner->page_id)
                                                <a
                                                    href="{{ route('page', Page::find($banner->page_id)->first()->slug) }}"><button
                                                        class="btn btn-primary border-0"
                                                        style="background-color: {{ $banner->button_color }};">
                                                        <p class="p-0 m-0" style="font-weight:1000">
                                                            {{ $banner->button_title }}</p>
                                                    </button></a>
                                            @elseif ($banner->post_id)
                                                <a
                                                    href="{{ route('page', Post::find($banner->post_id)->first()->slug) }}"><button
                                                        class="btn btn-primary border-0"
                                                        style="background-color: {{ $banner->button_color }};">
                                                        <p class="p-0 m-0" style="font-weight:1000">
                                                            {{ $banner->button_title }}</p>
                                                    </button></a>
                                            @else
                                                <a href="{{ url($banner->url) }}"><button
                                                        class="btn btn-primary border-0"
                                                        style="background-color: {{ $banner->button_color }};">
                                                        <p class="p-0 m-0" style="font-weight:1000">
                                                            {{ $banner->button_title }}</p>
                                                    </button></a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endif
            @endforeach

        </div>
        <button class="carousel-control-prev w-auto " type="button" data-bs-target="#indicate" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next  w-auto" type="button" data-bs-target="#indicate" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
