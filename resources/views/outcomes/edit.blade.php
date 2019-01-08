@extends('layouts.default')
@section('content')
<div class="col-lg-12">
  <h2>Edit an Outcome</h2>
</div>

@include('includes.errors')

{{ Form::model($outcome, ['method' => 'PATCH', 'action' => ['OutcomeController@update', $outcome->id]]) }}

  @include('outcomes.form', ['submitButtonText' => 'Update'])

{{ Form::close() }}

@stop