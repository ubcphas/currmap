<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
<div class="row col-lg-12">
    <h1>Courses</h1>
</div>

<div class="row col-lg-12">
    <table id="dtable" class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Year</th>
        <th class="no-sort">Edit</th>
        <th class="no-sort">Delete</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($courses as $course)
      <tr>
        <td><a href={{ route('courses.show', $course->id) }}>{{ $course->id }}</a></td>
        <td>{{ $course->name }}</td>
        <td>{{ $course->short_description }}</td>
        <td>{{ $course->year }}</td>
        
        <td><a href="{{action('CourseController@edit', $course['id'])}}" class="btn btn-warning">Edit</a>
        </td>

        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['CourseController@destroy', $course->id]]) }}

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
      "info": true
    });
  });
</script>
@stop