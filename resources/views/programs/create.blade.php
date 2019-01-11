<!-- create.blade.php -->
@extends('layouts.default')
@section('content')
  <div class="col-lg-12">
      <h2>Program Input</h2><br/>
  </div>
<!-- Handle validation errors -->
  @include('includes.errors')

  {{ Form::open(['action' => 'ProgramController@store']) }}

  @include('programs.form', ['submitButtonText' => 'Create'])
  @include('programs.courses')

  <div class='form-group'>
   {{ Form::submit('Create', ['class' => 'btn btn-lg btn-success form-control', 'style' => "margin-top:20px"]) }}
  </div>

  {{ Form::close() }}

@stop


@section('js')
<script>
  $(document).ready(function(){
    $("#dtable").DataTable( {
      "columnDefs": [
      {"orderable": false, "targets": "no-sort"}
      ],
      "paging": false,
      "info": false
    });
  });
</script>
@stop
