<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md12">
            <div class="form-group">
                {!! Form::label('image', 'image*') !!}
                {!! Form::file(
                    'image',
                    $errors->has('image')
                        ? ['class' => 'form-control is-invalid', 'accept' => 'image/*']
                        : ['class' => 'form-control', 'accept' => 'image/png, image/*'],
                ) !!}
                {!! $errors->first('image', '<p class="help-block invalid-feedback">:message</p>') !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('title_1', 'Big Title*') !!}
                {!! Form::text(
                    'title_1',
                    @$banner->title_1,
                    $errors->has('title_1') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('title_1', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('title_2', 'Medium Title*') !!}
                {!! Form::text(
                    'title_2',
                    @$banner->title_2,
                    $errors->has('title_2') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('title_2', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('title_3', 'Small Title') !!}
                <span class="text-secondary fw-italic">(Opstion)</span>
                {!! Form::text(
                    'title_3',
                    @$banner->title_3,
                    $errors->has('title_3') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('title_3', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('url', 'Url') !!}
                <span class="text-secondary fw-italic">(Opstion)</span>
                {!! Form::text(
                    'url',
                    @$banner->url,
                    $errors->has('url') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('url', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('post_id', 'Post') !!}
                <span class="text-secondary fw-italic">(Opstion)</span>
                {!! Form::select('post_id[]', $post, [], ['class' => 'form-control', 'placeholder' => 'Select Page']) !!}
                {!! $errors->first('post_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('page_id', 'Page') !!}
                <span class="text-secondary fw-italic">(Opstion)</span>
                {!! Form::select('page_id[]', $page, [], ['class' => 'form-control', 'placeholder' => 'Select Page']) !!}
                {!! $errors->first('page_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                {!! Form::label('button_title', 'Button Title*') !!}
                {!! Form::text(
                    'button_title',
                    @$banner->button_title,
                    $errors->has('button_title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('button_title', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                {!! Form::label('button_color', 'Button Color*') !!}
                {!! Form::text('button_color', @$banner->button_color, $errors->has('button_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('button_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                {!! Form::label('text_button_color', 'Text Button Color*') !!}
                {!! Form::text('text_button_color', @$banner->text_button_color, $errors->has('text_button_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('text_button_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>



    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($banner) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
@endpush
