<div class="form-group col-md-12">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description:') }}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>
