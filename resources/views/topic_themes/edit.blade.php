@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
    <h2>Edit a Topic Theme</h2>
  </div>

  @include('includes.errors')

  {{ Form::model($ttheme, ['method' => 'PATCH', 'action' => ['TopicThemeController@update', $ttheme->id]]) }}

  @include('topic_themes.form', ['submitButtonText' => 'Update'])

  {{ Form::close() }}

@stop