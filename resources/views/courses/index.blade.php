<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Courses</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('short_description', 'Description')</th>
        <th>@sortablelink('year', 'Year')</th>
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
@stop