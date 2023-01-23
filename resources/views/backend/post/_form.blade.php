<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('thumbnail', 'Thumbnail') !!}
                {!! Form::file('thumbnail', $errors->has('thumbnail') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                {!! $errors->first('thumbnail', '<p class="help-block invalid-feedback">:message</p>') !!}
                
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('jadwal', 'Tanggal Jadwal') !!}
                {!! Form::text('jadwal',@$webinar->jadwal ,$errors->has('jadwal') ? ['class'=>'form-control is-invalid ddatepicker'] : ['class'=>'form-control datepicker']) !!}
                {!! $errors->first('jadwal', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('judul', 'Judul Webinar') !!}
                {!! Form::text('judul', @$webinar->judul, $errors->has('judul') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('judul', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('narasumber_id', 'Narasumber') !!}
                {!! Form::select('narasumber_id[]', $narasumber,[], array('class' => 'form-control','multiple')) !!}
                {!! $errors->first('narasumber_id', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('moderator_id', 'Moderator') !!}
                {!! Form::select('moderator_id[]', $moderator,[], array('class' => 'form-control','multiple')) !!}
                {!! $errors->first('moderator_id', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('deskripsi', 'Deskripsi') !!}
                <textarea class="form-control rich-editor" name="deskripsi">{!! old('deskripsi', @$webinar->deskripsi) !!}</textarea>
                {!! $errors->first('deskripsi', '<p class="help-block invalid-feedback">:message</p>') !!} 
            </div>
        </div>
        
        
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($webinar) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    
@endpush
