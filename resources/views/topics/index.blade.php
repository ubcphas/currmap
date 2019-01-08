<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Course Topics</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name', 'Name')</th>
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
@stop