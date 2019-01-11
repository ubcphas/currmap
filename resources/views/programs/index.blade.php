<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
<div class="row col-lg-12">
    <h1>Programs</h1>
</div>

<div class="row col-lg-12">
    <table id="dtable" class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th class="no-sort">Edit</th>
        <th class="no-sort">Delete</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($programs as $program)
      <tr>
        <td><a href={{ route('programs.show', $program->id) }}>{{ $program->id }}</a></td>
        <td>{{ $program->name }}</td>
        <td>{{ $program->description }}</td>
        
        <td><a href="{{action('ProgramController@edit', $program['id'])}}" class="btn btn-warning">Edit</a>
        </td>

        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['ProgramController@destroy', $program->id]]) }}

          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop

@section('js')
<script>
  $(document).ready(function(){
    $("#dtable").DataTable( {
      "columnDefs": [
      { "orderable": false, "targets": "no-sort"}
      ],
      "order": [[1, "asc"]],
      "paging": false,
      "info": false
    });
  });
</script>
@stop
