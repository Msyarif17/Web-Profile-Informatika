<div class="fixed-top bg-light fw-bold" >

    <div class="container " style="font-size: 14px;">
        <div class="row justify-content-between text-center text-nowrap ">
            <div class="col">
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-phone"></i> (022)7800525
                </a>
            </div>
            <div class="col">
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-envelope"></i> info@uinsgd.ac.id
                </a>
            </div>
            <div class="col ">
                <a href="#" class="nav-link link-dark ">
                    <i class="fa-solid fa-location-dot"></i> Jl. A.H. Nasution No.105, Cibiru, Bandung 40614
                </a>
            </div>
            <div class="col">
                <div class="d-inline-flex">
                    <a href="#" class="nav-link link-dark">
                        <i class="px-2 fa-brands fa-square-facebook"></i>
                    </a>
                    <a href="#" class="nav-link link-dark">
                        <i class="px-2 fa-brands fa-youtube"></i>
                    </a>
                    <a href="#" class="nav-link link-dark">
                        <i class="px-2 fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md text-bold shadow">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}" >
                <div class="d-inline-flex justify-content-start">
                    <div style="margin-right: 4px;">
                        <img class="" src="{{asset('assets/images/Logo Teknik Informatika.png')}}" alt="Teknik Informatika" height="44px" width="44px" >
                    </div>
                    <span class="font-size-16 fw-bold">
                        TEKNIK<br>INFORMATIKA
                    </span>
                </div>
                
            </a>
  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapse" >
                
                <ul class="navbar-nav mb-2 mb-md-0 ">
                    @foreach($nav as $n)
                    
                    <li class="nav-item navbar-pills rounded-0 dropdown">
                        
                        @if(count($n->menu)>0)
                        <a class="nav-link dropdown-toggle" href="{{url($n->url_target)}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$n->name}}
                         </a>
                        <ul class="dropdown-menu rounded-0 ">
                            
                                @foreach($n->menu as $m)
                                    @if(count($m->subMenu)==0)
                                    <li><a class="dropdown-item" href="{{url($m->url_target)}}">{{$m->name}}</a></li>
                                    
                                    @else
                                    <li class="dropdown">
                                        <button class="dropdown-item dropdown-toggle" href="{{url($m->url_target)}}" role="button" data-bs-toggle="dropdown" id="{{$m->slug}}" aria-expanded="false">{{$m->name}}</button>
                                        <ul class="dropdown-menu rounded-0" aria-labelledby="{{$m->slug}}">
                                            @foreach($m->subMenu as $sm)
                                            <li><a class="dropdown-item" href="{{url($sm->url_target)}}">{{$sm->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                @endforeach
                        </ul>
                        @else
                        <a class="nav-link " href="{{url($n->url_target)}}" role="button" >
                            {{$n->name}}
                         </a>
                        @endif
                    </li>
                    @endforeach
                    
                </ul>
            
            </div>
        </div>
    </nav>

</div>
