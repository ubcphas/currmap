<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Course Input</h2><br/>
  </div>
<!-- Handle validation errors -->
  @include('includes.errors')

  {{ Form::open(['action' => 'CourseController@store']) }}

  @include('courses.form', ['submitButtonText' => 'Create'])
  @include('courses.topics_outcomes')

  <div class='form-group'>
   {{ Form::submit('Create', ['class' => 'btn btn-lg btn-success form-control', 'style' => "margin-top:20px"]) }}
  </div>

  {{ Form::close() }}

@stop