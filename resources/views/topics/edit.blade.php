@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
    <h2>Edit a Topic</h2>
  </div>

  @include('includes.errors')

  {{ Form::model($topic, ['method' => 'PATCH', 'action' => ['TopicController@update', $topic->id]]) }}

  @include('topics.form', ['submitButtonText' => 'Update'])

  {{ Form::close() }}

@stop