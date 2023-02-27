<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Nama User') !!}
                {!! Form::text('name', @$users->name, $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('email', 'Alamat Surel') !!}
                {!! Form::text('email', @$users->email, $errors->has('email') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('email', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::text('password', null, $errors->has('password') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('password', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('confirm-password', 'Konfirmasi Password') !!}
                {!! Form::text('confirm-password', null, $errors->has('password') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('confirm-password', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('roles', 'Peran') !!}
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                {!! $errors->first('roles', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($users) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    
@endpush
