<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md12">
            <div class="form-group">
                {!! Form::label('img', 'Image*') !!}
                {!! Form::file(
                    'img',
                    $errors->has('img')
                        ? ['class' => 'form-control is-invalid', 'accept' => 'image/*']
                        : ['class' => 'form-control', 'accept' => 'image/png, image/*'],
                ) !!}
                {!! $errors->first('img', '<p class="help-block invalid-feedback">:message</p>') !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Name*') !!}
                {!! Form::text(
                    'name',
                    @$partner->name,
                    $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('url', 'url*') !!}
                {!! Form::text(
                    'url',
                    @$partner->url,
                    $errors->has('url') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('url', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>



    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($partner) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
@endpush
