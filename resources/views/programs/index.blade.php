<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Programs</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name', 'Name')</th>
        <th>@sortablelink('description', 'Description')</th>
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
@stop