@extends('layouts.default')
@section('content')
<div class="col-lg-12">
  <h2>Edit an Outcome Theme</h2>
</div>

@include('includes.errors')

{{ Form::model($otheme, ['method' => 'PATCH', 'action' => ['OutcomeThemeController@update', $otheme->id]]) }}

  @include('outcome_themes.form', ['submitButtonText' => 'Update'])

{{ Form::close() }}

@stop