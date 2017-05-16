<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('departement_id') ? 'has-error' : ''}}">
    {!! Form::label('departement_id', 'Departement', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('departement_id', ['Software', 'Hardware', 'Chemical'], null, ['class' => 'form-control']) !!}
        <!--{!! Form::number('departement_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('departement_id', '<p class="help-block">:message</p>') !!}-->
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
