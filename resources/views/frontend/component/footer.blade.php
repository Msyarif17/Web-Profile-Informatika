<!-- FOOTER -->
<footer class="w-100 py-4 flex-shrink-0">
    <div class="container pt-4">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="d-inline-flex justify-content-start pb-3">
                    <div class="col-12  align-self-center">
                        <div class="d-inline-flex justify-content-center ">

                            <img src="{{ asset('assets/images/Logo UIN.png') }}" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-12  align-self-center">
                        <div class="d-inline-flex justify-content-center">

                            <img src="{{ asset('storage' . $webinfo->logo) }}" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <p class="small foo-font-color font-size-14 fw-bold mb-0">{{ $webinfo->major_name }}</p>
                <p class="small foo-font-color font-size-14 ">{{ $webinfo->address }}</p>

            </div>
            @foreach ($footer as $item)
                @if ($item->parent_id == null)
                    <div class="col-lg-4 col-md-6">
                        <h5 class="text-white mb-3">{{ $item->name }}</h5>
                        <ul class="list-unstyled foo-font-color">

                            @foreach ($footer as $child)
                                @if ($child->parent_id != null && $child->parent_id == $item->id)
                                    <li><a class="foo-font-color font-size-14 text-decoration-none"
                                            href="{{ $child->url }}">
                                            {{ $child->name }}</a></li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                @endif
            @endforeach

        </div>
        <div class="row text-center mt-2">
            <div class="col">
                <p class="small foo-font-color text-decoration-none font-size-14 mb-0">&copy; Copyrights. All rights
                    reserved. <a class="text-decoration-none foo-font-color "
                        href="#">{{ request()->getHttpHost() }}</a></p>
            </div>
        </div>
    </div>
</footer>
