<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
<div class="row col-lg-12">
<h1>Program Outcomes</h1>
</div>

<div class="row col-lg-12">
  <table id="dtable" class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th class="no-sort">Edit</th>
        <th class="no-sort">Delete</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($outcomes as $outcome)
      <tr>
        <td><a href={{ route('outcomes.show', $outcome->id) }}>{{ $outcome->id }}</a></td>
        <td>{{ $outcome->name }}</td>
        
        <td><a href="{{action('OutcomeController@edit', $outcome->id)}}" class="btn btn-warning">Edit</a>
        </td>

        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['OutcomeController@destroy', $outcome->id]]) }}

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
      "autoWidth": false,
      "info": false
    });
  });
</script>
@stop