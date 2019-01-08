@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
    <h2>Edit a Topic Level</h2>
  </div>

  @include('includes.errors')

  {{ Form::model($level, ['method' => 'PATCH', 'action' => ['LevelController@update', $level->id]]) }}

  @include('levels.form', ['submitButtonText' => 'Update'])

  {{ Form::close() }}

@stop