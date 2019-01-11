<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
<div class="row col-lg-12">
    <h1>Course Topics</h1>
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
      
      @foreach($topics as $topic)
      <tr>
        <td><a href={{ route('topics.show', $topic->id) }}>{{ $topic->id }}</a></td>
        <td>{{ $topic->name }}</td>
        
        <td><a href="{{action('TopicController@edit', $topic->id)}}" class="btn btn-warning">Edit</a></td>
        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['TopicController@destroy', $topic->id]]) }}

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
