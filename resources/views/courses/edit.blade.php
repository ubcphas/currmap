@extends('layouts.default')
@section('content')
<div class="col-lg-12">
  <h2>Edit a Course</h2><br  />
</div>

<!-- Handle validation errors -->
@include('includes.errors')

{{ Form::model($course, ['method' => 'PATCH', 'action' => ['CourseController@update', $course->id]]) }}

  @include('courses.form', ['submitButtonText' => 'Update'])
  @include('courses.topics_outcomes')

  <div class='form-group'>
    {{ Form::submit('Update', ['class' => 'btn btn-lg btn-success form-control', 'style' => "margin-top:20px"]) }}
  </div>

{{ Form::close() }}

@stop