<!-- index.blade.php -->
@extends('layouts.default')

@section('content')
    <h1>Program Outcomes</h1>

    <table class="table table-striped">
    <thead>
      <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('name', 'Name')</th>
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
@stop