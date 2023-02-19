@extends('frontend.component.page-master')
@section('page')
    <section>
        <div class="container pt-0">
            <hr class="pt-3 pb-0">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-capitalize" style="font-size: 40px;font-weight:1000">
                                {{ $content->title }}
                            </h1>
                        </div>
                        <hr class="my-3">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <span class="text-secondary">
                                        <i class="fa-solid fa-calendar"></i>
                                        {{ Carbon\Carbon::parse($content->created_at)->format('l, d F Y, H:m A') }}
                                    </span>
                                </div>
                                @if ($content->posted_by)
                                    <div class="">
                                        <span class="text-secondary"><i class="fa-solid fa-user"></i>
                                            {{ $content->user->name }}
                                        </span>
                                    </div>
                                @endif
                                <div class=""><span class="text-secondary"><i class="fa-solid fa-comment"></i>
                                        0 Comment</span></div>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="col-12 pb-3">
                            {!! $content->content !!}
                        </div>
                        @auth
                            <div class="col-12 pb-3">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h3 class="card-title pb-3">Komentar</h3>
                                        {!! Form::open([
                                            'route' => ['comment', $content->slug],
                                            'method' => 'post',
                                            'autocomplete' => 'false',
                                            'enctype' => 'multipart/form-data',
                                        ]) !!}
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 pb-3">
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Nama') !!}
                                                    {!! Form::text(
                                                        'name',
                                                        null,
                                                        $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 pb-3">
                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email') !!}
                                                    {!! Form::email(
                                                        'email',
                                                        null,
                                                        $errors->has('email') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                                                    ) !!}
                                                    {!! $errors->first('email', '<p class="help-block invalid-feedback">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 pb-3">
                                                <div class="form-group">
                                                    {!! Form::label('comment', 'Komentar') !!}
                                                    <textarea class="form-control" id="richtext" name="comment">{!! old('comment', @$categoryPost->description) !!}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 pb-3">
                                                <div class="form-group">
                                                    {!! Form::submit('Submit', ['class' => 'btn bg-light text-dark form-control btn-block', 'id' => 'save']) !!}
                                                </div>
                                            </div>


                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header"
                                        style="background-color:{{ $cui->navbar_color }};color:{{ $cui->navbar_text_color }}">
                                        <h3 class="card-title">Komentar Lainnya</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-12 pb-3">
                                                <div class="row">

                                                    <div class="col-2 fw-bold text-capitalize">test</div>
                                                    <div class="col-10 text-end">
                                                        <small class="">
                                                            {{ Carbon\Carbon::parse($content->created_at)->format('l, d F Y, H:m A') }}
                                                        </small>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="py-0 px-3">
                                                        <p class="">text</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="p-0">
                                            <div class="col-12 pb-3">
                                                <div class="row">

                                                    <div class="col-2 fw-bold text-capitalize">test</div>
                                                    <div class="col-10 text-end">
                                                        <small class="">
                                                            {{ Carbon\Carbon::parse($content->created_at)->format('l, d F Y, H:m A') }}
                                                        </small>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="py-0 px-3">
                                                        <p class="">text</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="p-0 border-3">
                                            <div class="col-12 pb-3">
                                                <div class="row">

                                                    <div class="col-2 fw-bold text-capitalize">test</div>
                                                    <div class="col-10 text-end">
                                                        <small class="">
                                                            {{ Carbon\Carbon::parse($content->created_at)->format('l, d F Y, H:m A') }}
                                                        </small>
                                                    </div>

                                                    <div class="col-12">
                                                        <hr class="py-0 px-3">
                                                        <p class="">text</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="p-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth


                    </div>

                </div>
                <div class="col-md-4 d-md-block d-sm-none">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-12 pb-3">
                                <div class="card">
                                    <img src="{{ asset('storage' . $post->thumbnail ? $post->thumbnail : $post->thumbnail) }}"
                                        alt="" class="card-img-top img-fluid"
                                        style="height:152px;object-fit: cover;object-position: center;">
                                    <div class="card-body">
                                        <div class="card-tittle fw-bold ">{{ $post->title }}</div>
                                        <div class="row p-0 m-0 justify-content-between py-1">
                                            <div class="col-6 p-0 m-0 text-start"><span class=""><i
                                                        class="fa-solid fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('l, d F Y, H:m A') }}</span>
                                            </div>
                                            <div class="col-6 p-0 m-0 text-end"><span class=""><i
                                                        class="fa-solid fa-comment"></i> 0 Comment</span></div>
                                        </div>
                                        <div class="card-text ">
                                            <p>{{ Str::limit(strip_tags($post->content), 100, '...') }}</p>

                                        </div>
                                        <div class="text-end">
                                            <a href="" class="text-decoration-none ">Baca selengkapnya <img
                                                    src="{{ asset('assets/images/Vector.png') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endForeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
