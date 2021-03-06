<div class="form-group">
  {{ Form::label('topic_theme_id', 'Topic Theme:') }}
  {{ Form::select('topic_theme_id', $themes, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Full Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 15]) }}
</div>

<div class='form-group'>
   {!! Form::submit($submitButtonText, ['class' => 'btn btn-lg btn-success form-control']) !!}
</div>

