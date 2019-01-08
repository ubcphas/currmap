<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Create new Topic</h2>
  </div>

  @include('includes.errors')

  {{ Form::open(['action' => 'TopicController@store']) }}

  @include('topics.form', ['submitButtonText' => 'Create'])

  {{ Form::close() }}

@stop