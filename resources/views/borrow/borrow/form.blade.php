<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    {!! Form::label('student_id', 'Student Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('student_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('student_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('book_id') ? 'has-error' : ''}}">
    {!! Form::label('book_id', 'Book Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('book_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('book_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('borrow_date') ? 'has-error' : ''}}">
    {!! Form::label('borrow_date', 'Borrow Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('borrow_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('borrow_date', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('return_date') ? 'has-error' : ''}}">
    {!! Form::label('return_date', 'Return Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('return_date', null, ['class' => 'form-control']) !!}
        {!! $errors->first('return_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
