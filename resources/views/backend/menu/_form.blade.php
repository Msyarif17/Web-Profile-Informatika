<div class="box-body">
    <div class="row">

        @if ($param == 'menu')
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    {!! Form::label('category_menu_id', 'Category Menu*') !!}
                    {!! Form::select('category_menu_id[]', $data, [], ['class' => 'form-control', 'placeholder' => 'Select Category Menu']) !!}
                    {!! $errors->first('category_menu_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
        @endif


        @if ($param == 'submenu')
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    {!! Form::label('category_menu_id', 'Category Menu*') !!}
                    {!! Form::select('category_menu_id[]', $data, [], ['class' => 'form-control', 'placeholder' => 'Select Menu']) !!}
                    {!! $errors->first('category_menu_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    {!! Form::label('menu_id', 'Menu*') !!}
                    {!! Form::select('menu_id[]', $data1, [], ['class' => 'form-control', 'placeholder' => 'Select Sub Menu']) !!}
                    {!! $errors->first('menu_id', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
        @endif
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Name*') !!}
                {!! Form::text(
                    'name',
                    @$old->name,
                    $errors->has('name') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}

            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('url_target', 'Url Target') !!}
                <span class="text-secondary fw-italic">(Default '#')</span>
                {!! Form::text(
                    'url_target',
                    @$old->url_target,
                    $errors->has('url_target') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control'],
                ) !!}
                {!! $errors->first('url_target', '<p class="help-block invalid-feedback">:message</p>') !!}

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


    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($post) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>
@section('plugins.richText', true)
@push('js')
@endpush
