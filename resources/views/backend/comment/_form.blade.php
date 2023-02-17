<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('thumbnail', 'Thumbnail') !!}
                {!! Form::file(
                    'thumbnail',
                    $errors->has('thumbnail')
                        ? ['class' => 'form-control is-invalid', 'accept' => 'image/*']
                        : ['class' => 'form-control', 'accept' => 'image/png, image/*'],
                ) !!}
                {!! $errors->first('thumbnail', '<p class="help-block invalid-feedback">:message</p>') !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('banner', 'Banner') !!}
                {!! Form::file(
                    'banner',
                    $errors->has('banner')
                        ? ['class' => 'form-control is-invalid', 'accept' => 'image/*']
                        : ['class' => 'form-control', 'accept' => 'image/png, image/*'],
                ) !!}
                {!! $errors->first('banner', '<p class="help-block invalid-feedback">:message</p>') !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('title', 'Post Title') !!}
                {!! Form::text(
                    'title',
                    @$post->title,
                    $errors->has('title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('category_post_id', 'Post Category') !!}
                {!! Form::select(
                    'category_post_id[]',
                    $categoryPost,
                    [],
                    ['class' => 'form-control', 'placeholder' => 'Select Page'],
                ) !!}
                {!! $errors->first('category_post_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('tag_id', 'Post Tags') !!}
                {!! Form::select('tag_id[]', $tag, [], ['class' => 'form-control', 'placeholder' => 'Select Page', 'multiple']) !!}
                {!! $errors->first('tag_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('content', 'Contents') !!}
                <textarea class="form-control" id="richtext" name="content">{!! old('content', @$post->content) !!}</textarea>
                {!! $errors->first('content', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>



    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($post) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
@endpush
