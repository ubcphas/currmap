<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Create new Topic Level</h2>
  </div>

  @include('includes.errors')

  {{ Form::open(['action' => 'LevelController@store']) }}

  @include('levels.form', ['submitButtonText' => 'Create'])

  {{ Form::close() }}

@stop