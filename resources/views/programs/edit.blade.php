@extends('layouts.default')
@section('content')
<div class="col-lg-12">
  <h2>Edit a Program</h2><br  />
</div>

<!-- Handle validation errors -->
@include('includes.errors')

{{ Form::model($program, ['method' => 'PATCH', 'action' => ['ProgramController@update', $program->id]]) }}

  @include('programs.form', ['submitButtonText' => 'Update'])
  @include('programs.courses')

  <div class='form-group'>
    {{ Form::submit('Update', ['class' => 'btn btn-lg btn-success form-control', 'style' => "margin-top:20px"]) }}
  </div>

{{ Form::close() }}

@stop