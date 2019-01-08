<div class="form-group">
    {{ Form::label('level', 'Level Number:') }}
    {{ Form::number('level', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Level Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class='form-group'>
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>

