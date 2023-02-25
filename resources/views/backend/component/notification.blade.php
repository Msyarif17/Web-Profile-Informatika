@if (Session::get('success', false))
    @if (is_array(Session::get('success')))
        @foreach (Session::get('success') as $msg)
            <div class="alert alert-success  mb-0" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success mb-0" role="alert">
            <i class="fa fa-check"></i>
            {{ Session::get('success') }}
        </div>
    @endif
@elseif (Session::get('errors', false))
    @if (is_array(Session::get('errors')))
        @foreach (Session::get('errors') as $msg)
            <div class="alert alert-danger  mb-0" role="alert">
                <i class="fa-solid fa-x"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-danger mb-0" role="alert">
            <i class="fa-solid fa-x"></i>
            {{ Session::get('errors') }}
        </div>
    @endif
@elseif (Session::get('warning', false))
    @if (is_array(Session::get('warning')))
        @foreach (Session::get('warning') as $msg)
            <div class="alert alert-warning  mb-0" role="alert">
                <i class="fa-solid fa-exclamation"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-warning mb-0" role="alert">
            <i class="fa-solid fa-exclamation"></i>
            {{ Session::get('warning') }}
        </div>
    @endif
@endif
