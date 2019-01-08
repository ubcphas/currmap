<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Topic Levels</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('level', 'Level')</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($levels as $level)
      <tr>
        <td><a href={{ route('levels.show', $level->id) }}>{{ $level->id }}</a></td>
        <td>{{ $level->name }}</td>
        
        <td><a href="{{action('LevelController@edit', $level->id)}}" class="btn btn-warning">Edit</a>
        </td>

        <td>
          {{ Form::open(['method' => 'DELETE', 'action' => ['LevelController@destroy', $level->id]]) }}

          {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop