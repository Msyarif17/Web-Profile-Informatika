<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'name') !!}
                {!! Form::text('name', @$footer->name, $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('url', 'URL') !!}
                {!! Form::text('url', @$footer->url, $errors->has('url') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('url', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('parent_id', 'Sub Menu From') !!}
                {!! Form::select('parent_id[]', $footer_list, @$old->menu->id, ['class' => 'form-control', 'placeholder' => 'Select Sub Menu']) !!}
                {!! $errors->first('parent_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($footer) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
@endpush
