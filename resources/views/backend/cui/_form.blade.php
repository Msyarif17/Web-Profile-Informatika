<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Theme Name') !!}
                {!! Form::text('name', @$cui->name, $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                {!! Form::label('video_thumbnail', 'Video Thumbnail') !!}
                {!! Form::file('video_thumbnail', $errors->has('video_thumbnail') ? ['class'=>'form-control is-invalid','accept'=>"video/mp4,video/x-m4v,video/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                {!! $errors->first('video_thumbnail', '<p class="help-block invalid-feedback">:message</p>') !!}
                
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                {!! Form::label('logo', 'Logo') !!}
                {!! Form::file('logo', $errors->has('logo') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                {!! $errors->first('logo', '<p class="help-block invalid-feedback">:message</p>') !!}
                
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                {!! Form::label('logo_name', 'Logo Name') !!}
                {!! Form::text('logo_name', @$cui->name, $errors->has('logo_name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('logo_name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-3">
            <div class="form-group">
                {!! Form::label('favicon', 'favicon') !!}
                {!! Form::file('favicon', $errors->has('favicon') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                {!! $errors->first('favicon', '<p class="help-block invalid-feedback">:message</p>') !!}
                
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('navbar_color', 'Navbar Color') !!}
                {!! Form::text('navbar_color', @$cui->navbar_color, $errors->has('navbar_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('navbar_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('navbar_text_color', 'Navbar Text Color') !!}
                {!! Form::text('navbar_text_color', @$cui->navbar_text_color, $errors->has('navbar_text_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('navbar_text_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('footer_color', 'Footer Color') !!}
                {!! Form::text('footer_color', @$cui->footer_color, $errors->has('footer_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('footer_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('footer_text_color', 'Footer Text Color') !!}
                {!! Form::text('footer_text_color', @$cui->footer_text_color, $errors->has('footer_text_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('footer_text_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('button_color', 'Button Color') !!}
                {!! Form::text('button_color', @$cui->button_color, $errors->has('button_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
                
                {!! $errors->first('button_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('card_color', 'Card Color') !!}
                {!! Form::text('card_color', @$cui->card_color, $errors->has('card_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('card_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('card_text_color', 'Card Text Color') !!}
                {!! Form::text('card_text_color', @$cui->card_text_color, $errors->has('card_text_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('card_text_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('background_color', 'Background Color') !!}
                {!! Form::text('background_color', @$cui->background_color, $errors->has('background_color') ? ['class' => 'form-control is-invalid colorpicker'] : ['class' => 'colorpicker form-control']) !!}
    
                {!! $errors->first('background_color', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('font', 'font') !!}
                {!! Form::text('font', @$cui->font, $errors->has('font') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                {!! $errors->first('font', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($cui) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
    
@endpush
