@if(Session::get('success', false))
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
            {{Session::get('success')}}
        </div>
    @endif
@endif