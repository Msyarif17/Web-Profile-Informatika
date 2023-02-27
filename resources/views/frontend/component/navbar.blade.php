<div class="fixed-top bg-light fw-bold">

    <div class="container " style="font-size: 14px;">
        <div class="row justify-content-between text-center text-nowrap ">
            <div class="col">
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-phone"></i> {{$webinfo->phone_number}}
                </a>
            </div>
            <div class="col">
                <a href="#" class="nav-link link-dark">
                    <i class="fa-solid fa-envelope"></i> {{env('MAIL_FROM_ADDRESS')}}
                </a>
            </div>
            <div class="col ">
                <a href="#" class="nav-link link-dark ">
                    <i class="fa-solid fa-location-dot"></i> {{$webinfo->short_address}}
                </a>
            </div>
            <div class="col">
                <div class="d-inline-flex">
                    @foreach ($socials as $s)
                    <a href="{{$s->url}}" class="nav-link link-dark">
                        <i class="px-2 fa-brands fa-square-{{$s->name}}"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md text-bold shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <div class="d-inline-flex justify-content-start">
                    <div style="margin-right: 4px;">
                        <img class="" src="{{ asset('storage'.$cui->logo) }}"
                            alt="Teknik Informatika" height="44px" width="44px">
                    </div>
                    <span class="font-size-16 fw-bold">
                        {!!$cui->logo_name!!}
                    </span>
                </div>

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapse">

                <ul class="navbar-nav mb-2 mb-md-0 ">
                    @foreach ($nav as $n)
                        @if (count($n->menu) > 0)
                            <li class="nav-item navbar-pills rounded-0 dropdown">

                                <a class="nav-link dropdown-toggle" href="{{ url($n->url_target) }}" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $n->name }}
                                </a>
                                <ul class="dropdown-menu rounded border-0">

                                    @foreach ($n->menu as $m)
                                        @if (count($m->subMenu) == 0)
                                            <li><a class="dropdown-item"
                                                    href="{{ url($m->url_target) }}">{{ $m->name }}</a></li>
                                        @else
                                            <li><a class="dropdown-item"
                                                    href="{{ url($m->url_target) }}">{{ $m->name }} &raquo;</a>
                                                <ul class="submenu dropdown-menu rounded  border-0">
                                                    @foreach ($m->subMenu as $sm)
                                                        <li><a class=" dropdown-item"
                                                                href="{{ url($sm->url_target) }}">{{ $sm->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item navbar-pills rounded-0 ">
                                <a class="nav-link " href="{{ url($n->url_target) }}" role="button">
                                    {{ $n->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown " class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

</div>
