<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('name', 'Reply to messages from') !!}
                {!! Form::text('name', @$comment->user->name, $errors->has('name') ? ['class' => 'form-control is-invalid','readonly'] : ['class' => 'form-control','readonly']) !!}
                {!! $errors->first('name', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="form-group">
                {!! Form::label('role', 'Role') !!}
                {!! Form::text('role', @implode(", ", $comment->user->getRoleNames() ? $comment->user->getRoleNames()->toArray() : []), $errors->has('role') ? ['class' => 'form-control is-invalid','readonly'] : ['class' => 'form-control','readonly']) !!}
                {!! $errors->first('role', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('post', 'Post') !!}
                {!! Form::text('post', @$comment->post->title, $errors->has('post') ? ['class' => 'form-control is-invalid','readonly'] : ['class' => 'form-control','readonly']) !!}
                {!! $errors->first('post', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 d-none">
            <div class="form-group">
                {!! Form::label('post_id', 'Post') !!}
                {!! Form::text('post_id', @$comment->post->id, $errors->has('role') ? ['class' => 'form-control is-invalid','readonly'] : ['class' => 'form-control','readonly']) !!}
                {!! $errors->first('post_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 d-none">
            <div class="form-group">
                {!! Form::label('parent_id', 'parent') !!}
                {!! Form::text('parent_id', @$comment->id, $errors->has('role') ? ['class' => 'form-control is-invalid','readonly'] : ['class' => 'form-control','readonly']) !!}
                {!! $errors->first('parent_id', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('message', 'Message') !!}
                <textarea class="form-control" readonly name="message">{!! old('message', @$comment->content) !!}</textarea>
                {!! $errors->first('message', '<p class="help-block invalid-feedback">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('content', 'Message Reply') !!}
                <textarea class="form-control"  name="content">{!! old('content', @$comment->childrent->content) !!}</textarea>
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
