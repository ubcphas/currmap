<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Create new Topic Theme</h2>
  </div>

  @include('includes.errors')

  {{ Form::open(['action' => 'TopicThemeController@store']) }}

  @include('topic_themes.form', ['submitButtonText' => 'Create'])

  {{ Form::close() }}

@stop