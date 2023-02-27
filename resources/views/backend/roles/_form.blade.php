<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Role Name') !!}
                {!! Form::text('name', @$roles->name, $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('permission_id', 'Permission*') !!} 
                {!! Form::select('permission_id[]', $permissions, [], ['class' => 'form-control', 'placeholder' => 'Select Permissions', 'multiple']) !!}
                {!! $errors->first('permission_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($roles) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    
@endpush
