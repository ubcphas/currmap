<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Create new Outcome</h2>
  </div>

  @include('includes.errors')

  {{ Form::open(['action' => 'OutcomeController@store']) }}

  @include('outcomes.form', ['submitButtonText' => 'Create'])

  {{ Form::close() }}

@stop