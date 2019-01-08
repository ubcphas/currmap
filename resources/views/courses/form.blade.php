  <div class="form-group col-md-12">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group col-md-12">
    {{ Form::label('year', 'Program Year:') }}
    {{ Form::number('year', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('short_description', 'Short Description:') }}
    {{ Form::text('short_description', null, ['class' => 'form-control']) }}
  </div>

  <div class="form-group">
    {{ Form::label('description', 'Full Description:') }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 15]) }}
  </div>
