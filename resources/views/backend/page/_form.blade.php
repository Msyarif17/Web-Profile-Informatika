<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('thumbnail', 'Thumbnail') !!}
                {!! Form::file('thumbnail', $errors->has('thumbnail') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                {!! $errors->first('thumbnail', '<p class="help-block invalid-feedback">:message</p>') !!}
                
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('banner', 'Banner') !!}
                {!! Form::file('banner', $errors->has('banner') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                {!! $errors->first('banner', '<p class="help-block invalid-feedback">:message</p>') !!}
                
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('title', 'page Title') !!}
                {!! Form::text('title', @$page->title, $errors->has('title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('content', 'Contents') !!}
                <textarea class="form-control" id="richtext" name="content">{!! old('content', @$page->content) !!}</textarea>
                {!! $errors->first('content', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($page) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    
@endpush
