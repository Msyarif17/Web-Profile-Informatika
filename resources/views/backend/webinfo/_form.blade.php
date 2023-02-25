<div class="box-body" id="webinfo">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('major_name', 'Major Name') !!}
                {!! Form::text(
                    'major_name',
                    @$webinfo->major_name,
                    $errors->has('major_name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('major_name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md12">
            <div class="form-group">
                {!! Form::label('logo', 'Logo*') !!}
                {!! Form::file(
                    'logo',
                    $errors->has('logo')
                        ? ['class' => 'form-control is-invalid', 'accept' => 'image/*']
                        : ['class' => 'form-control', 'accept' => 'image/png, image/*'],
                ) !!}
                {!! $errors->first('logo', '<p class="help-block invalid-feedback">:message</p>') !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('address', 'Address') !!}
                {!! Form::text(
                    'address',
                    @$webinfo->address,
                    $errors->has('address') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('address', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('short_address', 'Short Address') !!}
                {!! Form::text(
                    'short_address',
                    @$webinfo->short_address,
                    $errors->has('short_address') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('short_address', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('phone_number', 'Phone Number') !!}
                {!! Form::text(
                    'phone_number',
                    @$webinfo->phone_number,
                    $errors->has('phone_number') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('phone_number', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group" id='inputSM'>
                {!! Form::label('name', 'social media') !!}
                <div class="d-flex">

                    {!! Form::text(
                        'name',
                        null,
                        $errors->has('text')
                            ? ['class' => 'form-control is-invalid mr-3','id'=>'inputname']
                            : ['class' => 'form-control mr-3', 'placeholder' => 'name'],
                    ) !!}
                    {!! Form::text(
                        'url',
                        null,
                        $errors->has('text')
                            ? ['class' => 'form-control is-invalid mr-3','id'=>'inputurl']
                            : ['class' => 'form-control mr-3', 'placeholder' => 'url'],
                    ) !!}
                    <a href="#webinfo" id="add" class=" btn btn-primary">Add</a>
                </div>
                {!! $errors->first('text', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col-12">

                            {!! Form::label('social', 'Social Media List') !!}
                        </div>
                    </div>
                    <div id="listSM">
                        @if (isset($socials))
                            @foreach ($socials as $social)
                                <div class="d-flex">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="social[{{ $social->id }}][name]">name</label>
                                            <input class="form-control" name="social[{{ $social->id }}][name]"
                                                value="{{ $social->name }}" type="text" id="name">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="social[{{ $social->id }}][url]">url</label>
                                            <div class="d-flex">
                                                <input class="form-control mr-3" name="social[{{ $social->id }}][url]"
                                                    value="{{ $social->url }}" type="text" id="url">
                                                <a href="#listSM" data="{{$social->id}}"class="remove-input-field btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($webinfo) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    <script>
        var i = {{$socials->count()}}
        $("#add").click(function() {
            i++;
            var name = $("#inputSM input[name=name]").val();
            var url = $("#inputSM input[name=url]").val();
            $('#listSM').append(`
                        <div class="d-flex">
                            
                            <div class="col-4">
                                <div class="form-group">
                                    <label  for="social[` + i + `][name]">name</label>
                                    <div class="d-flex">
                                        <i class="fa-brands fa-` + name + ` my-auto mr-2"></i>
                                        <input class="form-control" name="social[` + i + `][name]" value="` + name + `" type="text" id="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="social[` + i + `][url]">url</label>
                                    <div class="d-flex">
                                        <input class="form-control mr-3" name="social[` + i + `][url]" value="` +
                url + `" type="text" id="url">
                                        <a href="#listSM" class="remove-input-field btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        `);
            $("#inputname").attr('value', '');
            $("#inputurl").attr('value', '');
        });
        $(document).on('click', '.remove-input-field', function() {
            
            $(this).parents('.d-flex').remove();
        });
    </script>
@endpush
